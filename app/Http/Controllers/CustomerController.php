<?php

namespace App\Http\Controllers;

use App\Fault;
use App\OrderProduct;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class CustomerController extends Controller
{
    public function orders()
    {
        $orders = OrderProduct::where('user_id',auth()->user()->id);
        return view('customer.orders')->with('orders',$orders);
    }

    public function fix()
    {
        $orders = Fault::where('owner_id',auth()->user()->id);
        return view('customer.fix-gadget');
    }

    public function showOrder()
    {
        return view('customer.order-details');
    }

    public function showExperts()
    {

        return view('customer.experts');
    }

    public function faultyGadgets()
    {
        return view('customer.faulty-gadgets');
    }

    public function buy()
    {
        return view('welcome');
    }
}
