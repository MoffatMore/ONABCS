@extends('layouts.admin-default')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.products') }}">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
        </ol>
    </nav>
    <div class="row-cols-1" style="margin-top: 30px">
        <form method="POST" enctype="multipart/form-data" action="{{ route('product.update',['product' => $product->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Name:</label>
                <div class="input-group">
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control float-right" id="name">
                </div>
                <!-- /.input group -->
            </div>
            <div class="form-group">
                <label>Price (BWP):</label>
                <div class="input-group">
                    <input type="text" name="price" value="{{ $product->price }}" class="form-control float-right" id="name">
                </div>
                <!-- /.input group -->
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="picture" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text" id="">Upload</span>
                  </div>
                </div>
              </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="textarea form-control" name="description" required placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $product->description }}</textarea>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@stop
