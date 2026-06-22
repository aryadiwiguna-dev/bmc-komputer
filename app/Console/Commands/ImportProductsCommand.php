<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Product;

class ImportProductsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import products from CSV file and copy matching images';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $csvPath = storage_path('app/import/NAMA BARANG.csv');

        if (!File::exists($csvPath)) {
            $this->error("File CSV tidak ditemukan di: {$csvPath}");
            return 1;
        }

        $this->info("Membaca file CSV...");

        // Get all image files in storage/app/import/images
        $importImagesPath = storage_path('app/import/images');
        $imageFiles = [];
        if (File::exists($importImagesPath)) {
            $imageFiles = File::files($importImagesPath);
        } else {
            $this->warn("Folder gambar tidak ditemukan di: {$importImagesPath}. Gambar tidak akan di-import.");
        }

        // Ensure target directory exists in public storage
        $publicDisk = Storage::disk('public');
        if (!$publicDisk->exists('products')) {
            $publicDisk->makeDirectory('products');
        }

        // Parse CSV
        $file = fopen($csvPath, 'r');
        
        // Read headers
        $headers = fgetcsv($file, 0, ',');
        // If comma is not the delimiter, try semicolon
        if (count($headers) <= 1) {
            rewind($file);
            $headers = fgetcsv($file, 0, ';');
            $delimiter = ';';
        } else {
            $delimiter = ',';
        }

        $this->info("Menggunakan delimiter: '{$delimiter}'");

        $importedCount = 0;
        $updatedCount = 0;
        $imageMatchedCount = 0;
        $rowCount = 0;

        while (($row = fgetcsv($file, 0, $delimiter)) !== false) {
            if (empty($row) || !isset($row[0])) {
                continue;
            }

            $namaBarang = trim($row[0]);
            // Skip header row if it is read
            if ($namaBarang === 'Nama Barang' || empty($namaBarang)) {
                continue;
            }

            $deskripsi = isset($row[1]) ? trim($row[1]) : '';
            $rowCount++;

            // Dynamic classification
            $kategori = $this->getCategory($namaBarang);
            $satuan = $this->getSatuan($namaBarang, $kategori);

            // Check if product already exists
            $product = Product::where('nama_barang', $namaBarang)->first();

            // Match image if available
            $imagePath = null;
            if (!empty($imageFiles)) {
                $matchedFile = $this->findMatchingImage($namaBarang, $imageFiles);
                if ($matchedFile) {
                    $extension = $matchedFile->getExtension();
                    $newFileName = Str::slug($namaBarang) . '.' . $extension;
                    $targetPath = 'products/' . $newFileName;

                    // Copy image to public storage
                    File::copy($matchedFile->getRealPath(), storage_path('app/public/' . $targetPath));
                    $imagePath = $targetPath;
                    $imageMatchedCount++;
                }
            }

            if ($product) {
                // Update existing product, keep current stock and prices
                $updateData = [
                    'deskripsi' => $deskripsi,
                ];
                if ($imagePath) {
                    $updateData['gambar'] = $imagePath;
                }
                $product->update($updateData);
                $updatedCount++;
            } else {
                // Create new product
                Product::create([
                    'nama_barang' => $namaBarang,
                    'deskripsi' => $deskripsi,
                    'kategori' => $kategori,
                    'harga_beli' => 0.00,
                    'harga_jual' => 0.00,
                    'stok' => 0,
                    'stok_minimum' => 5,
                    'satuan' => $satuan,
                    'gambar' => $imagePath,
                ]);
                $importedCount++;
            }
        }

        fclose($file);

        $this->info("========================================");
        $this->info("Proses Import Selesai!");
        $this->info("Total Baris Diproses: {$rowCount}");
        $this->info("Produk Baru Ditambahkan: {$importedCount}");
        $this->info("Produk Diperbarui: {$updatedCount}");
        $this->info("Gambar Berhasil Dicocokkan & Disalin: {$imageMatchedCount}");
        $this->info("========================================");

        return 0;
    }

    /**
     * Normalize strings for comparison.
     */
    private function normalizeString($str)
    {
        $str = strtolower($str);
        // Remove special characters, spaces, punctuation
        $str = preg_replace('/[^a-z0-9]/', '', $str);
        return trim($str);
    }

    /**
     * Find matching image file from image array.
     */
    private function findMatchingImage($productName, $imageFiles)
    {
        $normalizedProduct = $this->normalizeString($productName);
        if (empty($normalizedProduct)) {
            return null;
        }

        // 1. Try exact normalized match
        foreach ($imageFiles as $file) {
            $filename = pathinfo($file->getFilename(), PATHINFO_FILENAME);
            $normalizedFile = $this->normalizeString($filename);
            if ($normalizedProduct === $normalizedFile) {
                return $file;
            }
        }

        // 2. Try substring match (if file contains product name or product name contains file name)
        foreach ($imageFiles as $file) {
            $filename = pathinfo($file->getFilename(), PATHINFO_FILENAME);
            $normalizedFile = $this->normalizeString($filename);
            if (str_contains($normalizedFile, $normalizedProduct) || str_contains($normalizedProduct, $normalizedFile)) {
                return $file;
            }
        }

        return null;
    }

    /**
     * Determine category dynamically based on keywords.
     */
    private function getCategory($name)
    {
        $nameLower = strtolower($name);
        if (str_contains($nameLower, 'memory') || str_contains($nameLower, 'microsd') || str_contains($nameLower, 'hdd') || str_contains($nameLower, 'ssd') || str_contains($nameLower, 'harddisk') || str_contains($nameLower, 'flashdisk') || str_contains($nameLower, 'flasdisk') || str_contains($nameLower, 'case hdd') || str_contains($nameLower, 'case ssd')) {
            return 'Penyimpanan';
        }
        if (str_contains($nameLower, 'laptop') || str_contains($nameLower, 'notebook')) {
            return 'Laptop';
        }
        if (str_contains($nameLower, 'cctv') || str_contains($nameLower, 'camera') || str_contains($nameLower, 'ezviz') || str_contains($nameLower, 'ip cam') || str_contains($nameLower, 'hiview') || str_contains($nameLower, 'dvr') || str_contains($nameLower, 'indoor') || str_contains($nameLower, 'outdoor')) {
            return 'CCTV';
        }
        if (str_contains($nameLower, 'router') || str_contains($nameLower, 'wifi') || str_contains($nameLower, 'tplink') || str_contains($nameLower, 'switch') || str_contains($nameLower, 'lan') || str_contains($nameLower, 'ruijie') || str_contains($nameLower, 'extender')) {
            return 'Jaringan';
        }
        if (str_contains($nameLower, 'printer') || str_contains($nameLower, 'catridge') || str_contains($nameLower, 'tinta') || str_contains($nameLower, 'ribon') || str_contains($nameLower, 'pita')) {
            return 'Printer & Tinta';
        }
        if (str_contains($nameLower, 'kabel') || str_contains($nameLower, 'cable') || str_contains($nameLower, 'converter') || str_contains($nameLower, 'gender') || str_contains($nameLower, 'connector') || str_contains($nameLower, 'konektor') || str_contains($nameLower, 'splitter')) {
            return 'Kabel & Konektor';
        }
        if (str_contains($nameLower, 'keyboard') || str_contains($nameLower, 'mouse') || str_contains($nameLower, 'gamepad') || str_contains($nameLower, 'headset') || str_contains($nameLower, 'headphone') || str_contains($nameLower, 'fan casing') || str_contains($nameLower, 'fan proc') || str_contains($nameLower, 'kipas')) {
            return 'Aksesoris';
        }
        if (str_contains($nameLower, 'adaftor') || str_contains($nameLower, 'power supply') || str_contains($nameLower, 'psu') || str_contains($nameLower, 'ups') || str_contains($nameLower, 'batre') || str_contains($nameLower, 'batteray') || str_contains($nameLower, 'aki') || str_contains($nameLower, 'stop kontak') || str_contains($nameLower, 'colokan') || str_contains($nameLower, 'charger')) {
            return 'Kelistrikan & Power';
        }
        if (str_contains($nameLower, 'bracket') || str_contains($nameLower, 'breket') || str_contains($nameLower, 'wallmount')) {
            return 'Bracket & Dudukan';
        }
        return 'Komponen & Lainnya';
    }

    /**
     * Determine unit dynamically.
     */
    private function getSatuan($name, $category)
    {
        $nameLower = strtolower($name);
        if ($category === 'Laptop' || str_contains($nameLower, 'router') || str_contains($nameLower, 'cctv') || str_contains($nameLower, 'camera') || str_contains($nameLower, 'ups') || str_contains($nameLower, 'pc rakitan') || str_contains($nameLower, 'monitor') || str_contains($nameLower, 'box panel')) {
            return 'unit';
        }
        return 'pcs';
    }
}

