<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $transactions = Transaction::select('price', 'stock', 'transaction_date')->where('type', 'c')->get();
        $labels = $transactions->pluck('price'); // Misalnya, mengambil harga sebagai label
        $data = $transactions->pluck('stock');
        return view('dashboard', [
            'total_product' => Product::count(),
            'total_debit' => Transaction::where('type', 'd')->get(),
            'total_credit' => Transaction::where('type', 'c')->get(),
            'transactions' => $transactions,
            'chart_labels' => $labels,
            'chart_data' => $data
        ]);
    }
}
