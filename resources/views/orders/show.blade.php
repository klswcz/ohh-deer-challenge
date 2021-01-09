@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Order #{{$orderNumber}}</div>
                    <div class="card-body">
                        @foreach($order as $key => $value)
                            <p>{{ $key }}: {{ var_dump($value) }}</p><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
