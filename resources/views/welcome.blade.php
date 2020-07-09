@extends('layouts.customer-default')
@section('content')
    <style>
        .form-control-borderless {
            border: none;
        }

        .form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
            border: none;
            outline: none;
            box-shadow: none;
        }
    </style>
    <div class="container">
        <h3 class="h3">Available Computer Hardware's</h3>
        <div class="row-cols-2 justify-content-center">
            <div class="input-group mb-3 ">
                <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">Search</span>
                </div>
            </div>
            <!--end of col-->
        </div>
        <div class="container-fluid" style="margin-top: 50px">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-5 col-sm-5">
                        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-success">{{ $product->name }}</strong>
                                <h6 class="mb-0">
                                    <a class="text-dark" href="#">{{ $product->description }}</a>
                                </h6>
                                <a class="btn btn-sm btn-success" href="{{ route('product.show',['product'=>$product->id]) }}">View</a>

                            </div>
                            @if($product->picture != null)
                                <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="{{ asset('storage/products/'.$product->picture) }}" style="width: 200px; height: 250px;">
                            @else
                                <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [150x100]" src="{{ asset('images/gadget-place-holder.png') }}" style="width: 200px; height: 250px;">
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row-cols-2 offset-2">
            </div>
        </div>
    </div>
@stop
