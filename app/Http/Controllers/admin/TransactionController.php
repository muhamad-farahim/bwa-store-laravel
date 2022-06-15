<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Models\Transaction;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{
    function index(Request $request)
    {

        $sellTransactions = TransactionDetail::with(['transaction.user', 'product.galleries'])->get();
        $buyTransactions = TransactionDetail::with(['transaction.user', 'product.galleries'])->has('product.galleries')->get();

        return view('pages.admin.transaction.index', compact(['sellTransactions', 'buyTransactions']));
    }

    function show(Request $request, $id)
    {

        $transaction = TransactionDetail::with('transaction.user', 'product')->findOrFail($id);

        return view('pages.admin.transaction.show', compact('transaction'));
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

        return redirect()->route('admin.transactions.show', $id);
    }
}