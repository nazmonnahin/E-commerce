<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


}
