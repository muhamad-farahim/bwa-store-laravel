<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;

use Midtrans\Snap;
use Midtrans\Config;
use Throwable;

class CheckoutController extends Controller
{
    

    function process(Request $request)
    {
        //save users data

        $user = Auth::user();
        $user->update($request->except('total_price'));

        $code ="STORE-".mt_rand(0000000, 9999999);

        $carts = Cart::with('product')->where('users_id', $user->id)->get();
        // create transaction
        $transaction = Transaction::create([
            'users_id' => $user->id,
            'insurance_price' => 0,
            'total_price' => $request->total_price,
            'shipping_price' => 0,
            'transaction_status' => 'PENDING',
            'code' => $code,
        ]);

        foreach($carts as $cart){

            $trx ="STORE-".mt_rand(0000000, 9999999);

            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->price,
                'shipping_status' => 'PENDING',
                'resi' => '',
                'code' => $trx
            ]);
        }


        $carts = Cart::with('product')->where('users_id', $user->id)->delete();

        // konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $midtrans = [
            'transaction_details' => [
                'order_id' => $code,
                "gross_amount" => (int) $request->total_price,
            ],
            'costumer_details' =>[
                'first_name' => $user->name,
                'email' => $user->email,
            ],
            'enabled_payment' =>[
                'gopay',
                
            ],
            'vt_web' => []
        ];

        try
        {
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            return redirect($paymentUrl);
        }
        catch(Throwable $e)
        {
            echo $e -> getMessage();
        }


    }

    function callback()
    {

        

    }
}