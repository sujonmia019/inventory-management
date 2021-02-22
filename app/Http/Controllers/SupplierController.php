<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Supplier = Supplier::latest()->paginate(10);
        return view('pages.supplier.index', compact('Supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.supplier.create');
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
            'photo' =>  'required|mimes:png,jpg,jpeg',
            'full_name' =>  'required|max:50',
            'email' =>  'sometimes|email|unique:suppliers,email',
            'mobile' =>  'required|digits:11|unique:suppliers,mobile',
            'address' =>  'required|max:60',
        ]);

        $image = $request->file('photo');
        $imageName = rand().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(100,100)->save(public_path('assets/image/supplier/').$imageName);

        $SupplierCreate = Supplier::create([
            'name'  =>  $request->full_name,
            'avatar'    =>  $imageName,
            'mobile'  =>  $request->mobile,
            'email'  =>  $request->email,
            'address'  =>  $request->address,
            'created_by'    =>  Auth::user()->id
        ]);

        if ($SupplierCreate) {
            $notification = array(
                'message'   =>  'Supplier created successfull:)',
                'alert-type'    =>  'success'
            );

            return redirect()->route('supplier.index')->with($notification);
        }
    }

    /**s
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $SupplierInfo = Supplier::findOrFail($id);
        return view('pages.supplier.view', compact('SupplierInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Edit = Supplier::findOrFail($id);
        return view('pages.supplier.edit', compact('Edit'));
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
        $supplier = Supplier::findOrFail($id);

        $request->validate([
            'full_name'  =>  'required|string',
            'mobile' =>  'required|digits:11',
            'address' =>  'required|max:60'
        ]);

        $image = $request->file('photo');
        if (isset($image)) {
            $imageName = $supplier->avatar;
            Image::make($image)->resize(100,100)->save(public_path('assets/image/supplier/').$imageName);
        }
        else{
            $imageName = $supplier->avatar;
        }

        $SupplierCreate = Supplier::findOrFail($id)->update([
            'name'  =>  $request->full_name,
            'avatar'    =>  $imageName,
            'mobile'  =>  $request->mobile,
            'email'  =>  $request->email,
            'address'  =>  $request->address,
        ]);

        if ($SupplierCreate) {
            $notification = array(
                'message'   =>  'Supplier updated successfull:)',
                'alert-type'    =>  'success'
            );

            return redirect()->route('supplier.index')->with($notification);
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
        $imageDelete = Supplier::findOrFail($id);
        unlink(public_path('assets/image/supplier/').$imageDelete->avatar);

        $Delete =Supplier::findOrFail($id)->delete();
        if ($Delete) {
            $notification = array(
                'message'   =>  'Supplier deleted successfull:)',
                'alert-type'    =>  'success'
            );

            return redirect()->route('supplier.index')->with($notification);
        }
    }
}