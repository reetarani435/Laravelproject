<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use Illuminate\Http\UploadedFile;


class AdminController extends Controller
{
    public function view_catagory()
    {  
        $data = Catagory::all();
        return view('admin.catagory',compact('data'));
    }

    public function add_catagory(Request $request)
    {   

        $data = new Catagory;
        $data->catagory_name = $request->catagory;
        $data->save();
        return redirect()->back()->with('message','Catagory Added Successfully');
    }

    public function delete_catagory($id)
    {
         $data =Catagory::find($id);
         $data->delete();
         return redirect()->back()->with('message','catagory delete successfully');
         
    }

    public function view_product()
    {  
        $catagory =  Catagory::all();
        return view('admin.products',compact('catagory'));
    }

    public function add_product(Request $request)
    {
        $products = new Product;
        $products->title = $request->title;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->quantity = $request->quantity;
        $products->discount_price = $request->discount;
        $products->catagory = $request->catagory;
        $image = $request->file('image');
        
        $imagename = time(). '.' .$image->getClientOriginalExtension();
       
        $request->image->move('products',$imagename);
        $products->image = $imagename;

        $products->save();
        return redirect()->back()->with('message','Products successfully added');
        
    }
    public function show_product()
    {
       $product = Product::all();
        return view('admin.show_product',compact('product'));
   
    }
    public function delete_product($id)
    {
         $product = Product::find($id);
         $product->delete();
         return redirect()->back()->with('message','Products deleted successfully');

    }
    public function edit_product($id)
    {

        $product = Product::find($id);
        $catagory =  Catagory::all();
        return view('admin.edit_product',compact('product','catagory'));
    }

    public function update_product(Request $request,$id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount;
        $product->catagory = $request->catagory;
        $product->quantity = $request->quantity;
        $product->image = $request->image;
         
        $image = $request->image;
        if($image){
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('/products',$imagename);
        $product->image= $imagename;
         }
        $product->save();
        return redirect()->back();

    }

    
}
