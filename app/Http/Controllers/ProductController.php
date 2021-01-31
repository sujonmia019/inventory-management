<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Product = Product::with('user','supplier','category','unit')->latest()->paginate(10);
        return view('pages.products.index', compact('Product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Supplier = Supplier::latest()->get();
        $Category = Category::latest()->where('status', true)->get();
        $Unit = Unit::latest()->where('status', true)->get();
        return view('pages.products.create', compact('Supplier','Category','Unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'  =>  'required',
            'supplier_name'  =>  'required',
            'category_name'  =>  'required',
            'unit_name'  =>  'required'
        ]);

        if (isset($request->publish) != NULL) {
            $publish = true;
        }
        else{
            $publish = false;
        }

        $CreateProduct = Product::create([
            'name'  =>  $request->product_name,
            'supplier_id'  =>  $request->supplier_name,
            'category_id'  =>  $request->category_name,
            'unit_id'  =>  $request->unit_name,
            'quantity'  =>  0,
            'status'  =>  $publish,
            'created_by'  =>  Auth::user()->id
        ]);

        if($CreateProduct){
            $notification = array(
                'message'   =>  'Product created successfull:)',
                'alert-type'    =>  'success'
            );

            return redirect()->route('product.index')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Supplier = Supplier::latest()->get();
        $Category = Category::latest()->where('status', true)->get();
        $Unit = Unit::latest()->where('status', true)->get();
        $Edit = Product::findOrFail($id);
        return view('pages.products.edit', compact('Edit','Supplier','Category','Unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name'  =>  'required',
            'supplier_name'  =>  'required',
            'category_name'  =>  'required',
            'unit_name'  =>  'required'
        ]);

        if (isset($request->publish) != NULL) {
            $publish = true;
        }
        else{
            $publish = false;
        }

        $CreateProduct = Product::findOrFail($id)->update([
            'name'  =>  $request->product_name,
            'supplier_id'  =>  $request->supplier_name,
            'category_id'  =>  $request->category_name,
            'unit_id'  =>  $request->unit_name,
            'quantity'  =>  0,
            'status'  =>  $publish,
            'created_by'  =>  Auth::user()->id
        ]);

        if($CreateProduct){
            $notification = array(
                'message'   =>  'Product updated successfull:)',
                'alert-type'    =>  'success'
            );

            return redirect()->route('product.index')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Deleted = Product::findOrFail($id)->delete();

        if($Deleted){
            $notification = array(
                'message'   =>  'Product deleted successfull:)',
                'alert-type'    =>  'success'
            );

            return redirect()->route('product.index')->with($notification);
        }
    }
}