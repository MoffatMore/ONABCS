<?php

namespace App\Http\Controllers;

use App\Fault;
use App\OrderProduct;
use App\User;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class CustomerController extends Controller
{
    public function orders()
    {
        $orders = OrderProduct::with('product')
            ->where('user_id',auth()->user()->id);
        return view('customer.orders')->with('orders',$orders);
    }

    public function fix()
    {

        return view('customer.fix-gadget');
    }

    public function showOrder()
    {
        return view('customer.order-details');
    }

    public function showExperts(int $fid)
    {
        $user = User::paginate(3);
        return view('customer.experts')
            ->with([
                'users'=>$user,
                'fid' =>$fid,
            ]);
    }

    public function faultyGadgets()
    {
        $user = User::find(auth()->user()->id);
        $user->load(['faults','faults.expert']);
        return view('customer.faulty-gadgets')->with('user',$user);
    }

    public function buy()
    {
        return view('welcome');
    }
}
