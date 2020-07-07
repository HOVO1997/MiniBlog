@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @forelse($product as $prod)

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="..." alt="image">
                <div class="card-body">
                    <h5 class="card-title">{{ $prod->firm }}</h5>
                    <p class="card-text">{{ $prod->model }}</p>
                    <p class="card-text">{{ $prod->price }}</p>
                    <p class="card-text">{{ $prod->content }}</p>
                </div>
            </div>
            @empty
                <p>No product</p>
            @endforelse


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
        </div>
    </div>
</div>
@endsection
