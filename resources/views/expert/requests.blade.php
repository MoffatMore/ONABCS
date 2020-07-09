@extends('layouts.expert-default')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customer Request</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Customer Request</li>
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
                    @foreach($user->fix as $fault)
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
                                <div class="row-cols-2">
                                    @if($fault->status !== 'Accepted')
                                    <form action="{{ route('fault.update',['fault'=>$fault->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="Accepted">
                                        <button type="submit" class="btn btn-info text-white">
                                            <i class="fas fa-check"></i> Accept
                                        </button>
                                    </form>
                                    @endif
                                    <br/>
                                    @if($fault->status !== 'Rejected')
                                    <form method="POST" action="{{ route('fault.update',['fault'=>$fault->id]) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="Rejected">
                                        <button type="submit" class="btn btn-danger text-white">
                                            <i class="fas fa-times"></i> Reject
                                        </button>
                                    </form>
                                        @endif
                                </div>
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
