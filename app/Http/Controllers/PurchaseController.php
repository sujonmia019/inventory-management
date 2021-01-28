<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Purchase = Purchase::latest()->paginate(10);
        return view('pages.purchase.index', compact('Purchase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Supplier = Supplier::where('status', true)->latest()->get();
        return view('pages.purchase.create', compact('Supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->category_id != NULL){

            $count = count($request->category_id);
            for ($i=0; $i < $count; $i++) {
                $Create = Purchase::create([
                    'supplier_id'   =>  $request->supplier_id[$i],
                    'category_id'   =>  $request->category_id[$i],
                    'product_id'   =>  $request->product_id[$i],
                    'purchase_no'   =>  $request->purchase_no[$i],
                    'purchase_date'   => date('Y-m-d', strtotime($request->purchase_date[$i])),
                    'description'   =>  $request->description[$i],
                    'buying_qty'   =>  $request->buying_qty[$i],
                    'unit_price'   =>  $request->unit_price[$i],
                    'buying_price'   =>  $request->buying_price[$i],
                    'status'        =>  false,
                    'created_by'        =>  Auth::user()->id
                ]);
            }

            if ($Create) {
                $notification = array(
                    'message'   =>  'Purchase data created successfull:)',
                    'alert-type'    =>  'success'
                );

                return redirect()->route('purchase.index')->with($notification);
            }

        }else{
            $notification = array(
                'message'   =>  'Sorry! you do not select any item',
                'alert-type'    =>  'error'
            );

            return redirect()->back()->with($notification);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
