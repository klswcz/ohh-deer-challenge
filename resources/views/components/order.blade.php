<div class="card my-2">
    <div class="card-header d-flex align-items-center">
        @isset($collapse)
            @if($order->line_items[0]->image)
                <img src="{{$order->line_items[0]->image->src}}" alt=""
                     class="w-10 d-none d-sm-inline-block align-top mr-3 rounded shadow-sm">
            @endif

            <span class="mr-auto">
                Order {{$order->name}}
            </span>
                <button class="btn btn-link ml-4" data-toggle="collapse" data-target="#collapse-{{ $order->id }}"
                        aria-expanded="true" aria-controls="collapse-{{ $order->id }}">
                    Show / collapse
                </button>
        @else
            <span>Order {{$order->name}}</span>
        @endif
    </div>
    @isset($collapse)
    <div class="collapse" id="collapse-{{ $order->id }}">
    @endif
        <div class="card-body row flex-wrap">
            <div class="col-12">
                <a href="{{ $order->order_status_url }}" class="btn btn-link float-right"
                   target="_blank">Shipping status</a>
            </div>
            <div class="col-12 mb-4">
                <h4>Items</h4>
                @foreach($order->line_items as $lineItem)
                    <div class="col-12 mb-3 pl-0">
                        @if($lineItem->image)
                            <img src="{{$lineItem->image->src}}" alt=""
                                 class="w-15 d-none d-sm-inline-block align-top mr-3 rounded shadow-sm">
                        @endif
                        <p class="d-inline-block">
                            <span class="d-block">{{ $lineItem->quantity . 'x ' . $lineItem->title }}</span>
                            <span class="d-block">{{ $lineItem->variant_title }}</span>
                            <span>{{ $lineItem->grams . 'g' }}</span>
                            <span
                                class="d-block d-sm-none">{{ (float) $lineItem->price > 0 ? $lineItem->price * $lineItem->quantity .  ' ' . $order->currency : 'FREE' }}</span>
                        </p>
                        <p class="d-none d-sm-inline-block float-right">{{ (float) $lineItem->price > 0 ? $lineItem->price  * $lineItem->quantity .  ' ' .  $order->currency : 'FREE' }}</p>
                    </div>
                @endforeach
            </div>
            @isset($order->billing_address)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <h4>Billing address</h4>
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
            @endif
            @isset($order->shipping_address)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <h4>Shipping address</h4>
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
            @endif
            @isset($order->payment_details)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <h4>Payment details</h4>
                    <span class="d-block">{{ $order->payment_details->credit_card_number }}</span>
                    <span class="d-block">{{ $order->payment_details->credit_card_company }}</span>
                </div>
            @endif
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <h4>Costs</h4>
                <span
                    class="d-block">Subtotal price: {{ $order->subtotal_price . ' ' . $order->currency}}</span>
                <span class="d-block">Total tax: {{ $order->total_tax . ' ' . $order->currency}}</span>
                <span class="d-block">Total price: {{ $order->total_price . ' ' . $order->currency}}</span>
            </div>
        @isset($collapse)
        </div>
        @endif
    </div>
</div>
