<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::whereNotNull('gambar')
            ->where('gambar', '!=', '')
            ->orderBy('nama_barang', 'asc')
            ->get();

        // Get unique categories for filter dropdown
        $categories = Product::whereNotNull('gambar')
            ->where('gambar', '!=', '')
            ->select('kategori')
            ->distinct()
            ->pluck('kategori');

        return view('pages.catalog.index', compact('products', 'categories'));
    }
}
