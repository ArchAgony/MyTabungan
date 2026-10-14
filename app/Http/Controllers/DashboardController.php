<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        $income = Transaction::where('type', 'income')->sum('amount');
        $expense = Transaction::where('type', 'expense')->sum('amount');
        $balance = $income - $expense;
        $transactions = Transaction::with(['category'])->latest('date')->get();
        return view('dashboard', compact('income', 'expense', 'balance', 'transactions'));
    }
}
