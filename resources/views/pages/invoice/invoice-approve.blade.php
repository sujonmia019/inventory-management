@extends('layouts.app')
@push('title', 'Invoice List')

    @section('content')

        <div class="dt-content">
            <div class="card shadow-lg rounded-0 card-outline-primary">
                <div class="card-header">
                    <h3 class="m-0 d-flex justify-content-end"> <a href="{{ route('invoice.pending.index') }}" class="text-dark font-weight-normal">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-9 col-sm-6 col-12">
                            <h3 class="m-0">Customer Info</h3>
                            <ul class="mb-0 mt-3 p-0 list-unstyled">
                                <li class="mb-2"><span class=" ">Name:</span> {{ $ApproveInvoice->payment->customer->name }}</li>
                                <li class="mb-2"><span class=" ">Phone:</span> {{ $ApproveInvoice->payment->customer->mobile }}</li>
                                <li class="mb-2"><span class=" ">E-mail:</span> {{ $ApproveInvoice->payment->customer->email }}</li>
                                <li><span class=" ">Address:</span> {{ $ApproveInvoice->payment->customer->address }}</li>
                            </ul>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mt-col-3">
                            <p style="font-size: 16px;">Invoice No: <span>#{{ $ApproveInvoice->invoice_no }}</span></p>
                            <p class="m-0" style="font-size: 16px;">Invoice Date: <span>{{ date('d,M,Y', strtotime($ApproveInvoice->invoice_date)) }}</span></p>
                        </div>
                    </div>

                    @if ($ApproveInvoice->description != NULL)
                        <div class="row mt-2">
                            <div class="col-12">
                                <p class="m-0 font-weight-semibold text-center">Description: <span class="font-weight-normal">{{ $ApproveInvoice->description }}</span></p>
                            </div>
                        </div>
                    @else

                    @endif
                    <form action="{{ route('invoice.approve.store', $ApproveInvoice->id) }}" method="POST">
                        @csrf
                        <div class="row mt-3">
                            <div class="table-responsive">
                                <table class="table table-bordered border-dark table-sm table-striped text-center">
                                    <thead>
                                        <th style="font-weight: 500;">SL</th>
                                        <th style="font-weight: 500;">Product Name</th>
                                        <th style="font-weight: 500;">Category</th>
                                        <th style="font-weight: 500;">Current Stock</th>
                                        <th style="font-weight: 500;">Quantity</th>
                                        <th style="font-weight: 500;">Unit Price</th>
                                        <th style="font-weight: 500;">Total Price</th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                            $total_sum = 0;
                                        @endphp
                                        @foreach ($InvoiceDetail as $InvoiceDetails)
                                            <tr>
                                                <input type="hidden" name="invoice_id[]" value="{{ $InvoiceDetails->id }}">
                                                <input type="hidden" name="category_id[]" value="{{ $InvoiceDetails->category_id }}">
                                                <input type="hidden" name="product_id[]" value="{{ $InvoiceDetails->product_id }}">
                                                <input type="hidden" name="selling_qty[{{ $InvoiceDetails->id }}]" value="{{ $InvoiceDetails->selling_qty }}">
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $InvoiceDetails->product->name }}</td>
                                                <td>{{ $InvoiceDetails->category->name }}</td>
                                                <td>{{ $InvoiceDetails->product->quantity }}</td>
                                                <td>{{ $InvoiceDetails->selling_qty }}</td>
                                                <td>{{ $InvoiceDetails->unit_price }}</td>
                                                <td>{{ $InvoiceDetails->selling_price }}</td>
                                            </tr>
                                            @php
                                                $total_sum += $InvoiceDetails->selling_price;
                                            @endphp
                                        @endforeach

                                        <tr>
                                            <td colspan="6" style="font-weight: 500; text-align: right; padding-right: 20px;">Sub Total</td>
                                            <td>{{ $total_sum }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="font-weight: 500; text-align: right; padding-right: 20px;">Discount</td>
                                            <td>
                                                @if ($Payment->discount != NULL)
                                                    {{ $Payment->discount }}
                                                @else
                                                    0
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="font-weight: 500; text-align: right; padding-right: 20px;">Paid Amount</td>
                                            <td>{{ $Payment->paid_amount }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="font-weight: 500; text-align: right; padding-right: 20px;">Due Amount</td>
                                            <td>
                                                @if ($Payment->due_amount != NULL)
                                                {{ $Payment->due_amount }}
                                                @else
                                                    0
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="font-weight: 500; text-align: right; padding-right: 20px;">Grand Total</td>
                                            <td>{{ $Payment->total_amount }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-sm-12 col-12 text-right">
                                <button type="submit" class="btn btn-sm btn-success rounded-0 shadow-xl">Approved</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection


