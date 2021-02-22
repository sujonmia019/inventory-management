<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Customer = Customer::latest()->paginate(10);
        return view('pages.customer.index', compact('Customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.customer.create');
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
            'email' =>  'sometimes|unique:customers,email',
            'mobile' =>  'required|digits:11|unique:customers,mobile',
            'address' =>  'required|max:60',
        ]);

        $image = $request->file('photo');
        $imageName = rand().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(100,100)->save(public_path('assets/image/customer/').$imageName);

        $CustomerCreate = Customer::create([
            'name'  =>  $request->full_name,
            'avatar'    =>  $imageName,
            'mobile'  =>  $request->mobile,
            'email'  =>  $request->email,
            'address'  =>  $request->address,
            'created_by'    =>  Auth::user()->id
        ]);

        if ($CustomerCreate) {
            $notification = array(
                'message'   =>  'Customer created successfull:)',
                'alert-type'    =>  'success'
            );

            return redirect()->route('customer.index')->with($notification);
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
        $CustomerInfo = Customer::findOrFail($id);
        return view('pages.customer.view', compact('CustomerInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Edit = Customer::findOrFail($id);
        return view('pages.customer.edit', compact('Edit'));
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
        $Customer = Customer::findOrFail($id);

        $request->validate([
            'full_name'  =>  'required|string',
            'mobile' =>  'required|digits:11',
            'address' =>  'required|max:60'
        ]);

        $image = $request->file('photo');
        if (isset($image)) {
            $imageName = $Customer->avatar;
            Image::make($image)->resize(100,100)->save(public_path('assets/image/customer/').$imageName);
        }
        else{
            $imageName = $Customer->avatar;
        }

        $CustomerCreate = Customer::findOrFail($id)->update([
            'name'  =>  $request->full_name,
            'avatar'    =>  $imageName,
            'mobile'  =>  $request->mobile,
            'email'  =>  $request->email,
            'address'  =>  $request->address,
        ]);

        if ($CustomerCreate) {
            $notification = array(
                'message'   =>  'Customer updated successfull:)',
                'alert-type'    =>  'success'
            );

            return redirect()->route('customer.index')->with($notification);
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
        $imageDelete = Customer::findOrFail($id);
        unlink(public_path('assets/image/customer/').$imageDelete->avatar);

        $Delete =Customer::findOrFail($id)->delete();
        if ($Delete) {
            $notification = array(
                'message'   =>  'Customer deleted successfull:)',
                'alert-type'    =>  'success'
            );

            return redirect()->route('customer.index')->with($notification);
        }
    }
}