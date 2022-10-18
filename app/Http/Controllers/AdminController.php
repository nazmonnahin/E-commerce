<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use PDF;

class AdminController extends Controller
{
    public function category()
    {
        $data = Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
        $data =new Category();

        $data->category_name = $request->category;

        $data->save();

        return back()->with('message','Category Added Successfully');

    }

    public function delete_category ($id)
    {
        $data = Category::find ($id);

        $data->delete();

        return back();
    }


    public function add_product()
    {
        $data = Category::all();

        return view('admin.add_product',compact('data'));
    }


    public function submit_product(Request $request)
    {
        $product = new Product();

        $image=$request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('product_image',$imagename);

        $product->image=$imagename;

        $product->title=$request->title;
        $product->description=$request->description;
        $product->category=$request->category;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;

        $product->save();

        return back()->with('message','Product Added Successfully');

    }


    public function product_list()
    {
        $data = Product::all();
        return view('admin.product_list',compact('data'));
    }


    public function delete_product($id)
    {
        $data = Product::find($id);

        $data->delete();
        
        return back();
    }

    public function edit_product ($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        
        return view('admin.edit_product',compact('product','category'));
    }

    public function update_product (Request $request, $id)
    {
        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;

        $image = $request->file;
        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->file->move('product_image',$imagename);
            $product->image=$imagename;
            }
        $product->save();

        return back()->with('message','Information Update Successfully');
        
        
    }


    public function order()
    {
        $data = Order::all();
        return view('admin.order',compact('data'));
    }


    public function delivered($id)
    {
        $order=order::find($id);
        $order->delivery_status= "Delivered";
        $order->payment_status="paid";

        $order->save();

        return redirect()->back();
        
    }


    public function print_pdf($id)
    {
        $order = Order::find($id);

       $pdf=PDF::loadView('admin.pdf',compact('order'));

       return $pdf->download('order_details.pdf',);
    }


}
