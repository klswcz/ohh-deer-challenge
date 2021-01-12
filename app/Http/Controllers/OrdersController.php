<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function show(Request $request)
    {
        $request->validate([
            'number' => 'required|string'
        ]);

        $client = new Client();
        $response = $client->request(
            'GET',
            config('shopify.url') . '/orders.json?name=' . $request->get('number'),
            [
                'auth' => [
                    config('shopify.key'),
                    config('shopify.password')
                ]
            ]
        );

        $order = collect(json_decode($response->getBody())->orders)->first();

        if ($order === null) {
            return back()->withErrors([
                'number' => 'Order not found'
            ])->withInput();
        }

        // Add images to $order object
        foreach ($order->line_items as $lineItem) {
            $response = $client->request(
                'GET',
                config('shopify.url') . '/products/' . $lineItem->product_id . '/images.json',
                [
                    'auth' => [
                        config('shopify.key'),
                        config('shopify.password')
                    ]
                ]
            );
            $lineItem->image = json_decode($response->getBody())->images[0] ?? null;
        }

        return view('orders.show', [
            'order' => $order
        ]);
    }

    public function index()
    {

        $client = new Client();
        $response = $client->request(
            'GET',
            config('shopify.url') . '/orders.json',
            [
                'auth' => [
                    config('shopify.key'),
                    config('shopify.password')
                ]
            ]
        );

        $orders = collect(json_decode($response->getBody())->orders);

        // Add images to each order in $orders collection
        foreach ($orders as $order) {
            foreach ($order->line_items as $lineItem) {
                $response = $client->request('GET',
                    config('shopify.url') . '/products/' . $lineItem->product_id . '/images.json',
                    [
                        'auth' => [
                            config('shopify.key'),
                            config('shopify.password')
                        ]
                    ]
                );
                $lineItem->image = json_decode($response->getBody())->images[0] ?? null;
            }
        }

        return view('orders.index', [
            'orders' => $orders
        ]);
    }
}
