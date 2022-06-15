<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Transaction;
use App\Models\TransactionDetail;

class DashboardTransactionController extends Controller
{
    function index(Request $request)
    {

        $sellTransactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('product', function ($product) {
                $product->where('user_id', Auth::user()->id);
            })->get();
        $buyTransactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('transaction', function ($transaction) {
                $transaction->where('users_id', Auth::user()->id);
            })->get();

        return view('pages.dashboard-transactions', compact(['sellTransactions', 'buyTransactions']));
    }
    function details(Request $request, $id)
    {
        $transaction = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->findOrFail($id);
        return view('pages.dashboard-transactions-details', compact('transaction'));
    }

    function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                "transaction_status" => "in:UNPAID,PENDING,SHIPPING,SUCCESS"
            ]
        );

        $td = TransactionDetail::findOrFail($id);

        $item = Transaction::findOrFail($td->transactions_id);

        $item->update($data);

        return redirect()->route('dashboard-transactions-details', $id);
    }
}