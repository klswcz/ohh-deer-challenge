<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function show(Request $request)
    {
        $request->validate([
            'orderNumber' => 'required|string'
        ]);

        $orderNumber = $request->get('orderNumber');

        return view('orders.show', [
            'orderNumber' => $orderNumber
        ]);
    }
}
