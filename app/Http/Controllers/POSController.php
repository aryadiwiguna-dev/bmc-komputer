<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class POSController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::where('stok', '>', 0)
            ->orderBy('nama_barang', 'asc')
            ->get();

        $categories = Product::select('kategori')->distinct()->pluck('kategori');

        return view('pages.pos.index', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.jumlah' => 'required|integer|min:1',
            'bayar' => 'required|numeric|min:0',
        ]);

        $items = $request->input('items');
        $bayar = (float)$request->input('bayar');
        $totalHarga = 0.0;

        DB::beginTransaction();

        try {
            // Generate Transaction Number (e.g., TRX-YYYYMMDD-XXXX)
            $datePrefix = 'TRX-' . date('Ymd');
            $lastTrx = Transaction::where('no_transaksi', 'like', $datePrefix . '%')
                ->orderBy('no_transaksi', 'desc')
                ->first();
            
            if ($lastTrx) {
                $lastNum = (int)substr($lastTrx->no_transaksi, -4);
                $nextNum = str_pad($lastNum + 1, 4, '0', STR_PAD_LEFT);
            } else {
                $nextNum = '0001';
            }
            $noTransaksi = $datePrefix . '-' . $nextNum;

            // 1. Create Transaction header
            $transaction = Transaction::create([
                'no_transaksi' => $noTransaksi,
                'tanggal' => Carbon::now(),
                'total_harga' => 0, // will update later
                'user_id' => Auth::id(),
            ]);

            // 2. Add details & adjust stock
            foreach ($items as $item) {
                $product = Product::lockForUpdate()->find($item['product_id']);

                if ($product->stok < $item['jumlah']) {
                    DB::rollBack();
                    return response()->json([
                        'success' => false,
                        'message' => "Stok produk '{$product->nama_barang}' tidak mencukupi. Tersedia: {$product->stok}.",
                    ], 422);
                }

                $subtotal = $product->harga_jual * $item['jumlah'];
                $totalHarga += $subtotal;

                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $product->id,
                    'jumlah' => $item['jumlah'],
                    'harga_satuan' => $product->harga_jual,
                    'subtotal' => $subtotal,
                ]);

                // Decrease stock
                $product->stok -= $item['jumlah'];
                $product->save();
            }

            // 3. Update total price in header
            $transaction->total_harga = $totalHarga;
            $transaction->save();

            DB::commit();

            // Load transaction details
            $transaction->load('details.product', 'user');

            $kembalian = $bayar - $totalHarga;

            return response()->json([
                'success' => true,
                'message' => 'Transaksi berhasil diproses.',
                'data' => [
                    'transaction' => $transaction,
                    'bayar' => $bayar,
                    'kembalian' => $kembalian,
                ],
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memproses transaksi: ' . $e->getMessage(),
            ], 500);
        }
    }
}
