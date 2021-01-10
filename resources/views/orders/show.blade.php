@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        Order #{{$orderNumber}} <a href="{{ $order->order_status_url }}" class="float-right"
                                                   target="_blank">Shipping status</a>
                    </div>
                    <div class="card-body row flex-wrap">
                        <div class="col-12 mb-4">
                            <h4>Items:</h4>
                            @foreach($order->line_items as $lineItem)
                                <div class="col-12 mb-3 pl-0">
                                    @if($lineItem->image)
                                        <img src="{{$lineItem->image->src}}" alt="" class="w-15 d-none d-sm-inline-block align-top mr-3 rounded shadow-sm">
                                    @endif
                                    <p class="d-inline-block">
                                        <span class="d-block">{{ $lineItem->quantity . 'x ' . $lineItem->title }}</span>
                                        <span class="text-uppercase d-block">{{ $lineItem->variant_title }}</span>
                                        <span>{{ $lineItem->grams . 'g' }}</span>
                                        <span class="d-block d-sm-none">{{ (float) $lineItem->price > 0 ? $lineItem->price . $order->currency : 'FREE' }}</span>
                                    </p>
                                    <p class="d-none d-sm-inline-block float-right">{{ (float) $lineItem->price > 0 ? $lineItem->price . $order->currency : 'FREE' }}</p>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <h4>Billing address:</h4>
                            <span class="d-block">{{ $order->billing_address->company }}</span>
                            <span class="d-block">{{ $order->billing_address->name }}</span>
                            <span class="d-block">{{ $order->billing_address->address1 }}</span>
                            <span class="d-block">{{ $order->billing_address->address2 }}</span>
                            <span class="d-block">{{ $order->billing_address->city }}</span>
                            <span class="d-block">{{ $order->billing_address->zip }}</span>
                            <span class="d-block">{{ $order->billing_address->province }}</span>
                            <span class="d-block">{{ $order->billing_address->country }}</span>
                            <span class="d-block">{{ $order->billing_address->phone }}</span>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <h4>Shipping address:</h4>
                            <span class="d-block">{{ $order->shipping_address->company }}</span>
                            <span class="d-block">{{ $order->shipping_address->name }}</span>
                            <span class="d-block">{{ $order->shipping_address->address1 }}</span>
                            <span class="d-block">{{ $order->shipping_address->address2 }}</span>
                            <span class="d-block">{{ $order->shipping_address->city }}</span>
                            <span class="d-block">{{ $order->shipping_address->zip }}</span>
                            <span class="d-block">{{ $order->shipping_address->province }}</span>
                            <span class="d-block">{{ $order->shipping_address->country }}</span>
                            <span class="d-block">{{ $order->shipping_address->phone }}</span>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <h4>Payment details</h4>
                            <span class="d-block">{{ $order->payment_details->credit_card_number }}</span>
                            <span class="d-block">{{ $order->payment_details->credit_card_company }}</span>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <h4>Summary</h4>
                            <span class="d-block">Subtotal price: {{ $order->subtotal_price . ' ' . $order->currency}}</span>
                            <span class="d-block">Total tax: {{ $order->total_tax . ' ' . $order->currency}}</span>
                            <span class="d-block">Total price: {{ $order->total_price . ' ' . $order->currency}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
