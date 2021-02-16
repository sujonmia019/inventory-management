<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
use App\Models\Payment;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Invoice = Invoice::latest()->paginate(18);
        return view('pages.invoice.index', compact('Invoice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Customer= Customer::latest()->where('status', true)->get();
        $Category = Category::where('status', true)->latest()->get();
        $Date = Date('m-d-Y');
        // invoice no auto generate
        $Invoice_no = Invoice::orderby('id','desc')->first();
        if ($Invoice_no == NULL) {
            $Invoice_no = 100000;
            $Invoice_no = $Invoice_no + 1;
        }
        else{
            $Invoice_no = $Invoice_no->invoice_no + 1;
        }
        return view('pages.invoice.create', compact('Category','Invoice_no','Customer','Date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->category_id != NULL) {
            if ($request->total_price < $request->partial_paid) {
                $notification = array(
                    'message'   =>  'Sorry! paid amount is maximum then total amount',
                    'alert-type'    =>  'error'
                );
                return redirect()->back()->with($notification);
            }
            else{

                // invoice data insert
                $Invoice = Invoice::create([
                    'invoice_no'    =>  $request->invoice_no,
                    'invoice_date'  =>  date('Y-m-d', strtotime($request->invoice_date)),
                    'description'   =>  $request->discription,
                    'created_by'    => Auth::user()->id
                ]);

                // multiple invoice details insert
                if ($Invoice) {
                    $Category_Count = count($request->category_id);
                    for ($i=0; $i < $Category_Count; $i++) {
                        $Details = InvoiceDetails::create([
                            'invoice_details_date' => date('Y-m-d', strtotime($request->invoice_date[$i])),
                            'invoice_id'           => $Invoice->id,
                            'category_id'          => $request->category_id[$i],
                            'product_id'           => $request->product_id[$i],
                            'selling_qty'          => $request->selling_qty[$i],
                            'unit_price'           => $request->unit_price[$i],
                            'selling_price'        => $request->selling_price[$i],
                        ]);
                    }

                    // new customer insert
                    if($request->customer_id == '0'){
                        $Customer = Customer::create([
                            'name'    => $request->customer_name,
                            'mobile'  => $request->customer_mobile,
                            'address' => $request->customer_address,
                            'created_by'    =>  Auth::user()->id
                        ]);
                        $customer_id = $Customer->id;
                    }
                    else{
                        $customer_id = $request->customer_id;
                    }

                    // invoice payment
                    if ($request->paid_status == 'full_paid') {
                        Payment::create([
                            'invoice_id'    =>  $Invoice->id,
                            'customer_id'   =>  $customer_id,
                            'paid_status'   =>  $request->paid_status,
                            'discount'      =>  $request->discount_price,
                            'total_amount'  =>  $request->total_price,
                            'paid_amount'   =>  $request->total_price,
                            'due_amount'    =>  0
                        ]);
                    }elseif($request->paid_status == 'full_due'){
                        Payment::create([
                            'invoice_id'    =>  $Invoice->id,
                            'customer_id'   =>  $customer_id,
                            'paid_status'   =>  $request->paid_status,
                            'discount'      =>  $request->discount_price,
                            'total_amount'  =>  $request->total_price,
                            'paid_amount'   =>  0,
                            'due_amount'    =>  $request->total_price,
                        ]);
                    }
                    elseif($request->paid_status == 'partial_paid'){
                        $paid_amount = $request->partial_paid;
                        $due_amount = $request->total_price-$paid_amount;
                        Payment::create([
                            'invoice_id'    =>  $Invoice->id,
                            'customer_id'   =>  $customer_id,
                            'paid_status'   =>  $request->paid_status,
                            'discount'      =>  $request->discount_price,
                            'total_amount'  =>  $request->total_price,
                            'paid_amount'   =>  $paid_amount,
                            'due_amount'    =>  $due_amount
                        ]);
                    }

                    $notification = array(
                        'message'   =>  'Invoice created successfull.',
                        'alert-type'    =>  'success'
                    );
                    return redirect()->back()->with($notification);
                }

            }

        }else{
            $notification = array(
                'message'   =>  'field is required.',
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