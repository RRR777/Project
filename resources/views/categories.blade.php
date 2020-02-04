@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h3 class="card-title text-center font-weight-bold">{{ __('Kategorijų medis:') }}</h3>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <ul>
                            @foreach ($categories as $category)
                                <li>{{ $category->name }}</li>
                                <ul>
                                @foreach ($category->childrenCategories as $childCategory)
                                    @include('child_category', ['child_category' => $childCategory])
                                @endforeach
                                </ul>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
