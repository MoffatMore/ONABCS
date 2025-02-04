@extends('layouts.customer-default')

@section('content')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        .rating-header {
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
    <!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <div class="row">
            <h2>Rate Expert {{ $expert->name }}</h2>
        </div>
        <form action="{{ route('rating.store') }}" method="POST">
            @csrf
            <div class="form-group" id="rating-ability-wrapper">
                <label class="control-label" for="rating">
                    <span class="field-label-header">How would you rate {{ $expert->name }} according to the service provided?*</span><br>
                    <span class="field-label-info"></span>
                    <input type="hidden" id="fault" name="fault" value="{{ $fault }}">
                    <input type="hidden" id="expert" name="expert" value="{{ $expert->id }}">
                    <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                </label>
                <h2 class="bold rating-header" style="">
                    <span class="selected-rating">0</span><small> / 5</small>
                </h2>
                <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
                    <i class="fa fa-star" aria-hidden="true"></i>
                </button>
                <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
                    <i class="fa fa-star" aria-hidden="true"></i>
                </button>
                <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
                    <i class="fa fa-star" aria-hidden="true"></i>
                </button>
                <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
                    <i class="fa fa-star" aria-hidden="true"></i>
                </button>
                <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
                    <i class="fa fa-star" aria-hidden="true"></i>
                </button>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>

    <script>
        jQuery(document).ready(function($){
            $(".btnrating").on('click',(function(e) {
                var previous_value = $("#selected_rating").val();
                var selected_value = $(this).attr("data-attr");
                $("#selected_rating").val(selected_value);

                $(".selected-rating").empty();
                $(".selected-rating").html(selected_value);

                for (i = 1; i <= selected_value; ++i) {
                    $("#rating-star-"+i).toggleClass('btn-warning');
                    $("#rating-star-"+i).toggleClass('btn-default');
                }

                for (ix = 1; ix <= previous_value; ++ix) {
                    $("#rating-star-"+ix).toggleClass('btn-warning');
                    $("#rating-star-"+ix).toggleClass('btn-default');
                }

            }));
        });
    </script>
@stop
