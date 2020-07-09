<?php

namespace App\Http\Controllers;

use App\OrderProduct;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index()
    {
        $products = Product::all();
        $orders = OrderProduct::all();
        $users = User::all();
        return view('admin-dashboard')->with([
            'products'=> $products,
            'orders' => $orders,
            'users' => $users
        ]);
    }

    public function orders()
    {
        $orders = OrderProduct::all();
        return view('admin.orders')->with('orders',$orders);
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users')->with('users',$users);
    }

    public function products()
    {
        $products = Product::all();
        return view('admin.products')->with('products',$products);
    }

    public function deleteProduct($product)
    {

        $product = Product::find($product);
        $product->delete();
        return redirect()->route('admin.products')->with('success','Successfully deleted product');
    }

}
