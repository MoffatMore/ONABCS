@extends('layouts.expert-default')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ratings Summary</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Customer Ratings Summary</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid" style="width: 99%">
        <div class="row" >
            <div class="row mt-3">
                <div class="col col-12 text-center">
                    <div class="card">
                        <div class="card-header">
                            <h2> 14240 <small> ratings </small></h2>
                        </div>
                        <div class="stars">
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <p> Average 4.5 <small> / </small> 5 </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
