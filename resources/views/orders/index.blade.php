@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                @foreach($orders as $order)
                    @include('components.order', ['order' => $order, 'collapse' => true])
                @endforeach
            </div>
        </div>
    </div>
@endsection
