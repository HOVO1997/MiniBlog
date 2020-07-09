@extends('layouts.app')

@section('content')
<div class="content">
    <div class="title m-b-md">
        Create a product
    </div>
    <form action="{{url('/admin/store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Firm</label>
        <input type="text" name="firm" id="name" required>
        <label for="model">Model</label>
        <input type="text" name="model" id="model" required>
        <label for="price">Prize</label>
        <input type="number" name="price" id="price" required><br>
        <hr>
        <label for="content">Content</label>
        <textarea style="width: 400px;height: 100px;resize: none;" type="text" name="cont" id="content"  required></textarea><br>
        <hr>
        <label for="img">Picture<img style="width: 80px;" src="{{ URL::asset("images/upload.png")}}" alt=""></label><br>
        <hr>
        <input style="display: none" type="file" name="select_file" id="img"   required>
        <input type="submit" value="Save" class="btn btn-success">
    </form>
</div>
    @endsection
