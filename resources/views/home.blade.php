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
                                <label for="number">Order number</label>
                                <input type="text" name="number" id="number" class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" required value="{{ old('number') }}">
                                @if($errors->has('number'))
                                    <div class="invalid-feedback">{{ $errors->first('number') }}</div>
                                @endif
                            </div>
                            <button class="btn btn-primary">Search</button>
                            <a href="/all-orders" class="btn btn-secondary ml-2">See all</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
