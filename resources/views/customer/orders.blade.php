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
                        <li class="breadcrumb-item active">My Orders</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Summary of My Orders</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->product->name }}</td>
                            <td>
                                {{ $order->product->description }}
                            </td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->product->price * $order->quantity }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                {{-- <a class="btn btn-sm btn-warning text-white">
                                    <i class="fas fa-edit" href="{{ route('order.show',['order' => $order->id]) }}"></i> Edit
                                </a> --}}
                                <a class="btn btn-sm btn-danger text-white" href="{{ route('customer.deleteOrder',['order' => $order->id]) }}">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                                <a href="{{ route('customer.order-details',['product'=>$order->product->id]) }}" class="btn btn-sm btn-info text-white">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->
@stop
