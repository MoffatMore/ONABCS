@extends('layouts.customer-default')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>My Orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('customer.orders') }}">Orders</a></li>
                        <li class="breadcrumb-item active">My Orders</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <h3 class="d-inline-block d-sm-none">{{ $product->name }}</h3>
                        <div class="col-12">
                            @if($product->picture !== null)
                                <img src="{{ asset('storage/'.$product->picture) }}" class="product-image" alt="Product Image" height="100px">
                            @else
                                <img src="{{ asset('images/gadget-place-holder.png') }}" class="product-image" alt="Product Image" height="100px">
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">{{ $product->name }}</h3>
                        <p>
                            {{ $product->description }}
                        </p>

                        <hr>
                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                BWP {{ $product->price }}
                            </h2>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.card -->

    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->
@stop
