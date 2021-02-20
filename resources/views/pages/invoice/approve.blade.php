@extends('layouts.app')
@push('title', 'Purchase')

    @section('content')

        <div class="dt-content">
            <div class="card shadow-lg rounded-0">
                <div class="card-header">
                    <h3 class="m-0 d-flex justify-content-between">Invoice Approve
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
                                <th style="font-weight: 500;">Action</th>
                            </thead>
                            <tbody>
                                @if ($Approve->count() > 0)
                                    @foreach ($Approve as $Approves)
                                        <tr>
                                            <td>{{ $Approve->firstItem()+$loop->index }}</td>
                                            <td>#{{ $Approves->invoice_no }}</td>
                                            <td>{{ $Approves->payment->customer->name }}</td>
                                            <td>{{ date('d M y', strtotime($Approves->invoice_date)) }}</td>
                                            <td>{{ $Approves->user->name }}</td>
                                            <td>৳ {{ $Approves->payment->total_amount }}</td>
                                            <td>
                                                @if ($Approves->status == true)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('invoice.show', $Approves->id) }}" class="btn btn-sm btn-info text-light"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>

                                    @endforeach

                                @else
                                    <tr>
                                        <td colspan="8" class="text-center text-danger">Invoice Approve Not Found</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $Approve->links() }}
                    </div>
                </div>
            </div>
        </div>

    @endsection

