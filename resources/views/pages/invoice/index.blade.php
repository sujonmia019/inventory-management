@extends('layouts.app')
@push('title', 'Invoice List')

    @section('content')

        <div class="dt-content">
            <div class="card shadow-lg rounded-0">
                <div class="card-header">
                    <h3 class="m-0 d-flex justify-content-between">Invoice List
                        <a href="{{ route('invoice.create') }}" class="btn btn-sm rounded-0 shadow-sm text-light btn-color"><i
                                class="fa fa-plus fa-sm"></i> Add New</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive scrollber">
                        <table class="table text-center table-bordered table-sm">
                            <thead>
                                <th style="font-weight: 500;">SL</th>
                                <th style="font-weight: 500;">Invoice No</th>
                                <th style="font-weight: 500;">Customer Name</th>
                                <th style="font-weight: 500;">Date</th>
                                <th style="font-weight: 500;">created_by</th>
                                <th style="font-weight: 500;">Amount</th>
                                <th style="font-weight: 500;">Status</th>
                            </thead>
                            <tbody>
                                @if ($Invoice->count() > 0)
                                    @foreach ($Invoice as $Invoices)
                                        <tr>
                                            <td>{{ $Invoice->firstItem()+$loop->index }}</td>
                                            <td>#{{ $Invoices->invoice_no }}</td>
                                            <td>{{ $Invoices->payment->customer->name }}</td>
                                            <td>{{ date('d M y', strtotime($Invoices->invoice_date)) }}</td>
                                            <td>{{ $Invoices->user->name }}</td>
                                            <td>৳ {{ $Invoices->payment->total_amount }}</td>
                                            <td>
                                                @if ($Invoices->status == true)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Pending</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                @else
                                    <tr>
                                        <td colspan="8" class="text-center text-danger">Purchase Not Found</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $Invoice->links() }}
                    </div>
                </div>
            </div>
        </div>

    @endsection


