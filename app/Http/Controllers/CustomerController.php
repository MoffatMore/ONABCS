<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Fault;
use App\OrderProduct;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        return view('customer-dashboard');
    }

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
        $user = User::all();
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
        //dd($products);
        return view('welcome')->with('products',$products);
    }

    public function rateExpert($expert,$fault)
    {
        $user = User::find($expert);
        return view('customer.rate-expert')->with(['expert'=>$user,'fault'=>$fault]);
    }

    public function deleteOrder($order)
    {
        $order = OrderProduct::find($order);
        $order->delete();
        return redirect()->route('customer.orders')->with('success','Successfully deleted an order');
    }

    public function deleteFault($fault)
    {
        $fault = Fault::find($fault);
        $fault->delete();
        return redirect()->route('customer.faults')->with('success','Successfully deleted fault gadget');
    }

    public function addItemCart(Request $request)
    {
        Cart::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('cart.index')->with('success','Successfully added item to cart');
    }

    public function deleteItemCart($item)
    {
        $order = Cart::find($item);
        $order->delete();
        return redirect()->back()->with('success','Successfully deleted a cart');
    }

    public function addItemOrder(Request $request)
    {
        $user = User::with('cart','cart.product')->find(auth()->user()->id);
        $carts = $user->cart;


        foreach ($carts as $key) {
            //dd($key->quantity);
            OrderProduct::updateOrCreate([
                'product_id' => $key->product_id,
                'quantity' => $key->quantity,
                'user_id' =>  $key->user_id,
                'status' => 'Pending'
            ],
            [
                'product_id' => $key->product_id,
                'quantity' => $key->quantity,
                'user_id' =>  $key->user_id,
                'status' => 'Pending',
                'quantity' => $key->quantity,
            ]);

            $key->delete();
        }

        return redirect()->route('customer.orders')->with('success','Successfully added an order');

    }
}
