@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Check your order status</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form action="/order" method="get">
                            <div class="form-group">
                                <label for="orderNumber">Order number</label>
                                <input type="text" name="orderNumber" id="orderNumber" class="form-control {{ $errors->has('orderNumber') ? 'is-invalid' : '' }}" required value="{{ old('orderNumber') }}">
                                @if($errors->has('orderNumber'))
                                    <div class="invalid-feedback">{{ $errors->first('orderNumber') }}</div>
                                @endif
                            </div>
                            <button class="btn btn-primary">Search</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
