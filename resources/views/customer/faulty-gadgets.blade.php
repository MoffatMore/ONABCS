@extends('layouts.customer-default')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>My Faulty Gadgets</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">My Faulty Gadgets</li>
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
                        <th>Fault Description</th>
                        <th>Assigned Expert</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->faults as $fault)
                    <tr>
                        <td>{{ $fault->name }}</td>
                        <td>
                            {{ $fault->description  }}
                        </td>
                        <td>
                            {{ $fault->expert !== null? $fault->expert->name : 'Not Assigned'}}
                        </td>
                        <td> {{ $fault->status }}</td>
                        <td>
                            <a class="btn btn-warning text-white" href="{{ route('fault.show',['fault' => $fault->id]) }}">
                                <i class="fas fa-edit" ></i> Edit
                            </a>
                            <a class="btn btn-danger text-white" href="{{ route('customer.deleteOrder',['order' => $fault->id]) }}">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                            @if($fault->expert === null)
                            <a href="{{ route('customer.expert-details',['fid'=>$fault->id]) }}" class="btn btn-success text-white">
                               Assign Expert
                            </a>
                                @endif
                            @if($fault->status === 'Accepted')
                                <a href="{{ route('customer.rateExpert',['expert' =>  $fault->expert->id,'fault' => $fault->id]) }}" class="btn btn-info text-white">
                                    <i class="fas fa-star"></i> Rate Expert
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Fault Description</th>
                        <th>Assigned Expert</th>
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
