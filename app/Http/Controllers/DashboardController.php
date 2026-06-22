<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        
        // Stats
        $salesCountToday = Transaction::whereDate('tanggal', $today)->count();
        $revenueToday = Transaction::whereDate('tanggal', $today)->sum('total_harga');
        $lowStockCount = Product::whereColumn('stok', '<=', 'stok_minimum')->count();
        $lowStockProducts = Product::whereColumn('stok', '<=', 'stok_minimum')->get();
        
        // Daily sales chart data for current month
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        
        $salesData = Transaction::select(
                DB::raw('DATE(tanggal) as date'),
                DB::raw('SUM(total_harga) as total')
            )
            ->whereBetween('tanggal', [$startOfMonth, $endOfMonth])
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();
            
        // Map sales to each day of the month for Chart.js
        $chartLabels = [];
        $chartValues = [];
        $daysInMonth = Carbon::now()->daysInMonth;
        
        for ($i = 1; $i <= $daysInMonth; $i++) {
            $dateStr = Carbon::now()->day($i)->toDateString();
            $chartLabels[] = $i;
            $daySale = $salesData->firstWhere('date', $dateStr);
            $chartValues[] = $daySale ? (float)$daySale->total : 0;
        }

        // Recent transactions
        $recentTransactions = Transaction::with('user')
            ->orderBy('tanggal', 'desc')
            ->limit(100)
            ->get();

        return view('dashboard', compact(
            'salesCountToday',
            'revenueToday',
            'lowStockCount',
            'lowStockProducts',
            'chartLabels',
            'chartValues',
            'recentTransactions'
        ));
    }

    public function report(Request $request)
    {
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', Carbon::now()->toDateString());

        // Format dates to cover full day (e.g. 00:00:00 to 23:59:59)
        $start = Carbon::parse($startDate)->startOfDay();
        $end = Carbon::parse($endDate)->endOfDay();

        $transactions = Transaction::with('user', 'details.product')
            ->whereBetween('tanggal', [$start, $end])
            ->orderBy('tanggal', 'desc')
            ->get();

        $totalRevenue = $transactions->sum('total_harga');
        $totalTransactions = $transactions->count();

        return view('pages.reports.index', compact(
            'transactions',
            'startDate',
            'endDate',
            'totalRevenue',
            'totalTransactions'
        ));
    }
}
