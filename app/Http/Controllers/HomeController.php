<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Session;
use Stripe;


class HomeController extends Controller
{



    public function index()
    {
    
        $product = Product::all();
        return view('frontend.home',compact('product'));
    }


    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype=='1') {

            return view('admin.home');

        }

        else{
            $product = Product::all();

            return view('frontend.home',compact('product'));
        }
    }

    public function product_details($id)
    {
        $item = Product::find($id);
        return view('frontend.product_details',compact('item'));
    }


    public function add_cart(Request $request, $id)
    {
        if(Auth::id()){

            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart;

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->address = $user->address;
            $cart->phone = $user->phone;
            $cart->user_id = $user->id;

            $cart->product_title = $product->title;

            if ($product->discount_price) {

                $cart->price = $product->discount_price * $request->quantity;

            }else{

                $cart->price = $product->price * $request->quantity;
            }
            
            $cart->image = $product->image;
            $cart->product_id = $product->id;

            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back();

            
        }
        else{
            return redirect('login');
        }
    }


    public function show_cart()
    {
        if (Auth::id()) {
      
        $id = Auth::user()->id;
        $cart = Cart::where('user_id','=',$id)->get();

        return view('frontend.show_cart',compact('cart'));
    }
    else{
        return redirect('login');
    }

    }

    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

         return back();
        
    }

    public function cash_order()
    {
        $user = Auth::user();
        $userid = $user->id;

        $data=Cart::where('user_id','=',$userid)->get();

        foreach($data as $data){

            $order =new Order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;


            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;


            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';

            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);

            $cart->delete();

        }

        return back();
    }


    public function stripe($totalprice)
    {
        
        
        return view('frontend.stripe',compact('totalprice'));
    }



    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for Payment." 
        ]);

        $user = Auth::user();
        $userid = $user->id;

        $data=Cart::where('user_id','=',$userid)->get();

        foreach($data as $data){

            $order =new Order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;


            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;


            $order->payment_status = 'Paid';
            $order->delivery_status = 'processing';

            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);

            $cart->delete();

        }


        Session::flash('success', 'Payment successful!');

         return redirect('/');

    }



}
