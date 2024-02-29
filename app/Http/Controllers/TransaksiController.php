<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Midtrans;

// my code goes here

class TransaksiController extends Controller
{
    public function index()
    {
        return view('transaksi.index');
    }
    public function store(Request $request){
        // dd($request->all());
        $request->request->add(['total_price' => $request->qty * 10000, 'status' => 'Unpaid']);
        $transaksi = Transaksi::create($request->all());



        Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $transaksi->id,
                'gross_amount' => $transaksi->total_price,
            ),
            'customer_details' => array(
                'name' => $request->name,
                'phone' => $request->phone,
            ),
        );

        $snapToken = Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);
        return view('transaksi.checkout', compact('snapToken', 'transaksi'));
    }
}
