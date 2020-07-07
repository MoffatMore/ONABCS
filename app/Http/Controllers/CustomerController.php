<?php

namespace App\Http\Controllers;


use App\Product;
use App\User;

class CustomerController extends Controller
{
    public function orders()
    {
       $user = User::find(auth()->user()->id);
       $user->load('orders');
        return view('customer.orders')->with('orders',$user->orders);
    }

    public function fix()
    {

        return view('customer.fix-gadget');
    }

    public function showOrder(Product $product)
    {
        return view('customer.order-details',compact('product'));
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
        $products = Product::all();
        return view('welcome')->with('products',$products);
    }
}
