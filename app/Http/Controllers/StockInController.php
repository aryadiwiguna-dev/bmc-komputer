<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\StockIn;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StockInController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', Carbon::now()->toDateString());

        $start = Carbon::parse($startDate)->startOfDay();
        $end = Carbon::parse($endDate)->endOfDay();

        $stockIns = StockIn::with('product', 'user')
            ->whereBetween('tanggal', [$start, $end])
            ->orderBy('tanggal', 'desc')
            ->get();

        $products = Product::orderBy('nama_barang', 'asc')->get();

        return view('pages.stock-in.index', compact('stockIns', 'products', 'startDate', 'endDate'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $product = Product::lockForUpdate()->find($request->product_id);
            
            // 1. Create StockIn record
            StockIn::create([
                'product_id' => $product->id,
                'jumlah' => $request->jumlah,
                'tanggal' => Carbon::now(),
                'keterangan' => $request->keterangan,
                'user_id' => Auth::id(),
            ]);

            // 2. Increase product stock
            $product->stok += $request->jumlah;
            $product->save();

            DB::commit();

            return redirect()->route('stock-in.index')->with('success', 'Stok masuk berhasil dicatat.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
