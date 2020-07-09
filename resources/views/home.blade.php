@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 gallery2">

                @forelse($product as $prod)

                    <div class="card mini_card ramka" style="width: 18rem;">
                        <img class="card-img-top" src="{{ URL::asset("images/$prod->image") }}" alt="image">
                        <div class="card-body">
                            <h2 class="card-title">{{ $prod->firm }}</h2>
                            <h3 class="card-text">{{ $prod->model }}</h3>
                            <h2 class="card-text price">{{ $prod->price }}</h2>
                            <p class="card-text size">{{ $prod->content }}</p>
                            <a class="btn btn-success" href="{{ url('admin').'/'.$prod->id  }} ">More</a>
                        </div>
                    </div>
                @empty
                    <h1 class="no_prod">No product</h1>
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
