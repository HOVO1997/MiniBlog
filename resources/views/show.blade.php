@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center show_card">
            <div class="col-md-8">
                    <div class="card mini_card " style="width: 25rem;">
                        <img class="card-img-top" src="{{ URL::asset("images/$product->image") }}" alt="image">
                        <div class="card-body">
                            <h2 class="card-title">{{ $product->firm }}</h2>
                            <h3 class="card-text">{{ $product->model }}</h3>
                            <h2 class="card-text price">{{ $product->price }}.AMD</h2>
                            <p class="card-text">{{ $product->content }}</p>
                            <form style="display: inline-block" action="{{ route('add_basket', $product) }}" method="POST">
                                <button type="submit" class="btn btn-info" >Add to Card</button>
                                @csrf
                            </form>
                        </div>
                    </div>

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

