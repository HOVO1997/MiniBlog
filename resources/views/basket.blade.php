@extends('layouts.app')

@section('content')
        <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <a style="font-size: 20px" href="{{url('home')}}">To Main Page</a>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th class="text-center">Price</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        @if(session('user.items'))
                        @foreach(session()->get('user.items') as $item)
                        <tbody>
                        <tr>
                            <td class="col-sm-8 col-md-6">
                                <div class="media">
                                    <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{URL::asset("images/$item->image")}}" style="width: 72px; height: 72px;"> </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$item->firm}}</h4>
                                        <h5 class="media-heading"> model {{ $item->model }}</h5>
                                        <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                                    </div>
                                </div></td>
                            <td class="col-sm-1 col-md-1" style="text-align: center">
                                <input type="email" class="form-control" id="exampleInputEmail1" value="1">
                            </td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>{{ $item->price }}.AMD</strong></td>
                            <td class="col-sm-1 col-md-1">
                                    <form style="display: inline-block" action="{{ route('delete_basket', $item->id) }}" method="POST">
                                        <button type="submit" class="btn btn-danger" >Remove</button>
                                        @csrf
                                    </form>
                                </td>
                        </tr>
                        </tbody>
                        @endforeach
                            @endif
                    </table>
                    <hr>
                    <a href="#" style="float: right;margin-right: 10px" class="btn btn-primary">Buy</a>
                </div>
            </div>
        </div>	<script type="text/javascript">
        </script>
        </body>
@endsection


