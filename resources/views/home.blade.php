@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h3 class="card-title text-center font-weight-bold">{{ __('Dashboard') }}</h3>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <h5 class="card-title text-center font-weight-bold">{{ Auth::user()->name }} {{ __(', You are logged in!') }}</h5>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <a class="register btn btn-primary btn-block font-weight-bold" href="{{ route('names') }}">
                                {{ __('Vardadieniai') }}
                            </a>
                        </div>

                        <div class="col-6">
                            <a class="register btn btn-primary btn-block font-weight-bold" href="{{ route('categories') }}">
                                {{ __('Kategorijos') }}
                            </a>
                        </div>
                    </div>
                    <br>
                    <h5 class="card-title text-center font-weight-bold">{{ __('Užsakymai') }}</h5>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Vardas, Pavardė</th>
                                    <th scope="col">El. Paštas</th>
                                    <th scope="col">Užsakymo Nr.</th>
                                    <th scope="col">Prekė</th>
                                    <th scope="col">Kiekis, vnt</th>
                                    <th scope="col">Kaina/ vnt</th>
                                    <th scope="col">Viso</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        @foreach ($order->products as $product)
                                            <tr>
                                                <td>{{ $order->user->name }}</td>
                                                <td>{{ $order->user->email }}</td>
                                                <td>{{ $order->order_number }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->pivot->quantity }}</td>
                                                <td>{{ $product->pivot->price }}</td>
                                                <td>{{ $product->pivot->quantity * $product->pivot->price }}</td>
                                            </tr>
                                        @endForeach
                                    @endForeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
