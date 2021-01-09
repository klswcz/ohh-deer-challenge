<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function show(Request $request)
    {
        $request->validate([
            'orderNumber' => 'required|string'
        ]);

        $orderNumber = $request->get('orderNumber');

        $client = new Client();
        $response = $client->request('GET', config('shopify.url') . '/orders.json?name=' . $orderNumber, [
            'auth' => [config('shopify.key'), config('shopify.password')]
        ]);

        $orders = collect(json_decode($response->getBody())->orders);

        if ($orders->isEmpty()) {
            return back()->withErrors([
                'orderNumber' => 'Order not found'
            ])->withInput();

        }


        return view('orders.show', [
            'orderNumber' => $orderNumber,
            'order' => $orders->first()
        ]);
    }
}
