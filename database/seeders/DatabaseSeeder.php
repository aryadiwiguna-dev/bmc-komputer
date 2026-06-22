<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Users
        User::create([
            'name' => 'Administrator BMC',
            'email' => 'admin@bmc.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'status' => 'active',
        ]);

        User::create([
            'name' => 'Staff Kasir 1',
            'email' => 'kasir@bmc.com',
            'password' => bcrypt('kasir123'),
            'role' => 'kasir',
            'status' => 'active',
        ]);

        User::create([
            'name' => 'Staff Kasir 2 (Nonaktif)',
            'email' => 'kasir2@bmc.com',
            'password' => bcrypt('kasir123'),
            'role' => 'kasir',
            'status' => 'inactive',
        ]);

        // 2. Seed Products
        \App\Models\Product::create([
            'nama_barang' => 'Asus ROG Gaming Laptop',
            'kategori' => 'Laptop',
            'harga_beli' => 15000000.00,
            'harga_jual' => 18500000.00,
            'stok' => 10,
            'stok_minimum' => 3,
            'satuan' => 'unit',
        ]);

        \App\Models\Product::create([
            'nama_barang' => 'Lenovo ThinkPad E14',
            'kategori' => 'Laptop',
            'harga_beli' => 12000000.00,
            'harga_jual' => 14200000.00,
            'stok' => 4,
            'stok_minimum' => 2,
            'satuan' => 'unit',
        ]);

        \App\Models\Product::create([
            'nama_barang' => 'PC Rakitan AMD Ryzen 5',
            'kategori' => 'PC & Komponen',
            'harga_beli' => 5500000.00,
            'harga_jual' => 6850000.00,
            'stok' => 3,
            'stok_minimum' => 1,
            'satuan' => 'unit',
        ]);

        \App\Models\Product::create([
            'nama_barang' => 'LG UltraFine 24 inch Monitor',
            'kategori' => 'PC & Komponen',
            'harga_beli' => 1600000.00,
            'harga_jual' => 2100000.00,
            'stok' => 5,
            'stok_minimum' => 2,
            'satuan' => 'unit',
        ]);

        \App\Models\Product::create([
            'nama_barang' => 'Corsair K70 Mechanical Keyboard',
            'kategori' => 'Aksesoris',
            'harga_beli' => 1400000.00,
            'harga_jual' => 1850000.00,
            'stok' => 2, // Low stock on purpose
            'stok_minimum' => 3,
            'satuan' => 'pcs',
        ]);

        \App\Models\Product::create([
            'nama_barang' => 'Logitech MX Master 3S Mouse',
            'kategori' => 'Aksesoris',
            'harga_beli' => 1100000.00,
            'harga_jual' => 1450000.00,
            'stok' => 15,
            'stok_minimum' => 5,
            'satuan' => 'pcs',
        ]);

        \App\Models\Product::create([
            'nama_barang' => 'SteelSeries Arctis Gaming Headset',
            'kategori' => 'Aksesoris',
            'harga_beli' => 950000.00,
            'harga_jual' => 1250000.00,
            'stok' => 8,
            'stok_minimum' => 3,
            'satuan' => 'pcs',
        ]);

        \App\Models\Product::create([
            'nama_barang' => 'Epson L3210 All-in-One Printer',
            'kategori' => 'Printer',
            'harga_beli' => 1950000.00,
            'harga_jual' => 2450000.00,
            'stok' => 6,
            'stok_minimum' => 2,
            'satuan' => 'unit',
        ]);

        \App\Models\Product::create([
            'nama_barang' => 'TP-Link WR840N Router WiFi',
            'kategori' => 'Jaringan',
            'harga_beli' => 150000.00,
            'harga_jual' => 210000.00,
            'stok' => 25,
            'stok_minimum' => 5,
            'satuan' => 'pcs',
        ]);

        \App\Models\Product::create([
            'nama_barang' => 'Corsair Vengeance DDR4 16GB RAM',
            'kategori' => 'PC & Komponen',
            'harga_beli' => 650000.00,
            'harga_jual' => 890000.00,
            'stok' => 12,
            'stok_minimum' => 3,
            'satuan' => 'pcs',
        ]);
    }
}
