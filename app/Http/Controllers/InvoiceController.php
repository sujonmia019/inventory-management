<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Supplier;
use PDF;
use Illuminate\Http\Request;
use App\Models\InvoiceDetails;
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
        $Invoice = Invoice::with('user','payment')->latest()->paginate(20);
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
        $Category = Category::latest()->where('status', true)->get();
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
        return view('pages.invoice.create', compact('Customer','Category','Invoice_no','Date'));
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
        $invoice = Invoice::with('invoiceDetails')->findOrFail($id);
        $invoiceDetails = InvoiceDetails::with('product','category')->where('invoice_id', $id)->get();
        $payment = Payment::where('invoice_id', $id)->first();
        $pdf = PDF::loadView('pdf.invoice', compact('invoice','invoiceDetails','payment'));
        return $pdf->stream();
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
        Invoice::findOrFail($id)->delete();
        InvoiceDetails::where('invoice_id', $id)->delete();
        Payment::where('invoice_id', $id)->delete();

        $notification = array(
            'message'   =>  'Invoice deleted successfull',
            'alert-type'    =>  'success'
        );

        return back()->with($notification);
    }

    // invoice approved index
    public function invoiceApprove(){
        $Approve = Invoice::latest()->where('status', true)->whereNotNull('approved_by')->paginate(15);
        return view('pages.invoice.approve', compact('Approve'));
    }

    // invoice pending index
    public function invoicePending(){
        $Pending = Invoice::latest()->where('status', false)->paginate(15);
        return view('pages.invoice.pending', compact('Pending'));
    }

    // invoice id wise show data
    public function invoiceApproveIdCall($id){
        $ApproveInvoice = Invoice::findOrFail($id);
        $InvoiceDetail = InvoiceDetails::with('product','category')->where('invoice_id', $id)->get();
        $Payment = Payment::where('invoice_id', $id)->first();
        return view('pages.invoice.invoice-approve', compact('ApproveInvoice','InvoiceDetail','Payment'));
    }

    // invoice approve
    public function invoiceApproveStore(Request $request, $id){
        foreach ($request->selling_qty as $key => $value) {
            $invoice_details = InvoiceDetails::where('id', $key)->first();
            $product = Product::where('id', $invoice_details->product_id)->first();
            if ($product->quantity < $request->selling_qty[$key]) {
                $notification = array(
                    'message'   =>  'Sorry! you approve maximum value',
                    'alert-type'    =>  'error'
                );

                return back()->with($notification);
            }

        }

        $invoice = Invoice::findOrFail($id)->update([
            'approved_by' => Auth::user()->id,
            'status' =>  true
        ]);

        foreach ($request->selling_qty as $key => $values) {
            $invoice_details = InvoiceDetails::where('id', $key)->first();
            $invoice_details->status = true;
            $invoice_details->save();
            $productName = Product::where('id', $invoice_details->product_id)->first();
            $productQty = ((float)$productName->quantity) - ((float)$request->selling_qty[$key]);
            Product::where('id', $invoice_details->product_id)->update([
                'quantity'  =>  $productQty
            ]);
        }

        $notification = array(
            'message'   =>  'Invoice Approve Successfull',
            'alert-type'    =>  'success'
        );

        return redirect()->route('invoice.approve.index')->with($notification);
    }

    // invoice pdf 



}
