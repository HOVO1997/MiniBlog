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
        <input type="number" name="price" id="price" required>
        <label for="content">Content</label>
        <input type="text" name="cont" id="content" required>
        <label for="img">Picture</label>
        <input type="file" name="select_file" id="img" required>
        <input type="submit" value="Save" class="btn btn-success">
    </form>
</div>
    @endsection
