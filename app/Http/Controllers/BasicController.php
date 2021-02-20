<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class BasicController extends Controller
{


    // invoice approved index
    public function invoiceApprove(){
        $Approve = Invoice::latest()->where('status', true)->paginate(15);
        return view('pages.invoice.approve', compact('Approve'));
    }

    // invoice pending index
    public function invoicePending(){
        $Pending = Invoice::latest()->where('status', false)->paginate(15);
        return view('pages.invoice.pending', compact('Pending'));
    }

}