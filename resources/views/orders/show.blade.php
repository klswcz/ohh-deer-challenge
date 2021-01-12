@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                @include('components.order', ['order' => $order])
            </div>
        </div>
    </div>
@endsection
