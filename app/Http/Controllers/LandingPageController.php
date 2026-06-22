<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::whereNotNull('gambar')
            ->where('gambar', '!=', '')
            ->orderBy('nama_barang', 'asc')
            ->get();

        return view('pages.landing', compact('products'));
    }
}
