
<!------ Include the above in your HEAD tag ---------->
<html>
    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <style>
            .table>tbody>tr>td, .table>tfoot>tr>td{
            vertical-align: middle;
            }
            @media screen and (max-width: 600px) {
                table#cart tbody td .form-control{
                    width:20%;
                    display: inline !important;
                }
                .actions .btn{
                    width:36%;
                    margin:1.5em 0;
                }

                .actions .btn-info{
                    float:left;
                }
                .actions .btn-danger{
                    float:right;
                }

                table#cart thead { display: none; }
                table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
                table#cart tbody tr td:first-child { background: #333; color: #fff; }
                table#cart tbody td:before {
                    content: attr(data-th); font-weight: bold;
                    display: inline-block; width: 8rem;
                }



                table#cart tfoot td{display:block; }
                table#cart tfoot td .btn{display:block;}

            }
        </style>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('dashboard') }}">ONABCS</a>
            <a class="navbar-brand" href="{{ route('dashboard') }}">Home</a>
              </div>
            </div><!-- /.container-fluid -->
          </nav>
        <div class="container" style="margin-top: 40px;">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width:50%">Product</th>
                        <th style="width:10%">Price</th>
                        <th style="width:8%">Quantity</th>
                        <th style="width:22%" class="text-center">Subtotal</th>
                        <th style="width:10%"></th>
                    </tr>
                </thead>
                <form method="POST" action="{{ route('customer.addItemOrder') }}">
                    @csrf
                <tbody>
                    @php
                        $total = 0;
                    @endphp

                        @foreach ($cart as $item)
                    <tr>
                    <input type="hidden" name="product_id_{{ $item->product->id }}" value="{{ $item->product->id }}">
                        <input type="hidden" name="quantity_{{ $item->product->id }}" value=" {{ $item->quantity }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-2 hidden-xs">
                                    @if($item->product->picture != null)
                                        <img style="max-width:100%; max-height: 40%" src="{{ asset('storage/products/'.$item->product->picture) }}" />
                                        @else
                                        <img style="max-width:100%; max-height: 10%" src="{{ asset('images/gadget-place-holder.png') }}" />
                                    @endif
                                </div>
                                <div class="col-sm-10">
                                <h4 class="nomargin">{{ $item->product->name }}</h4>
                                <p>{{ $item->product->description }}</p>
                                </div>
                            </div>
                        </td>
                        @php
                            $total += ($item->quantity * $item->product->price);
                        @endphp
                        <td data-th="Price">{{ $item->product->price }}</td>
                        <td data-th="Quantity">
                            <input type="number" class="form-control text-center" value="{{ $item->quantity }}">
                        </td>
                        <td data-th="Subtotal" class="text-center">{{ $item->quantity * $item->product->price }}</td>
                        <td class="actions" data-th="">
                        <a class="btn btn-danger btn-sm" href="{{ route('customer.deleteItemCart',['item'=>$item->id]) }}"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
                <tfoot>

                    <tr>
                    <td><a href="{{ route('customer.orders')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong>Total {{ $total }}</strong></td>
                    <td><button type="submit" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></button></td>
                    </tr>
                </tfoot>
                </form>
            </table>
        </div>
    </body>
</html>
