@extends('layouts.customer-default')
@section('content')

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="{{ asset('js/product-details.js') }}"></script>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
          <li class="breadcrumb-item active" aria-current="page">Details</li>
        </ol>
      </nav>
    <div class="row mt-5">
        <div class="col col-6">
            <div class="col-xs-4 item-photo">
                @if($product->picture != null)
                <img style="max-width:100%; max-height: 10%" src="{{ asset('storage/'.$product->picture) }}" />
                    @else
                    <img style="max-width:100%; max-height: 10%" src="{{ asset('images/gadget-place-holder.png') }}" />
                    @endif
            </div>
        </div>
        <div class="col col-6">
            <div class="col-xs-5" style="border:0px solid gray">
                <div class="col col-6">
                    <div class="col-xs-5" style="border:0px solid gray">
                        <!-- Datos del vendedor y titulo del producto -->
                        <h3>{{ $product->name }}</h3>

                        <!-- Precios -->
                        <h3 style="margin-top:0px;">BWP {{ $product->price }}</h3>
                        <div class="section" style="padding-bottom:5px;">
                            <h6 class="title-attr"><small>Details</small></h6>
                            <div>
                                <div class="attr2">{{ $product->description }}</div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="section" style="padding-bottom:20px;">
                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" name="quantity" class="form-control" value="1">
                        </div>
                        <button class="btn btn-success">
                            <span style="margin-right:20px" class="fa fa-shopping-cart" aria-hidden="true">
                            </span> Order product
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
