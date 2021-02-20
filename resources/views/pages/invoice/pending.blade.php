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
                                @if ($Pending->count() > 0)
                                    @foreach ($Pending as $Pendings)
                                        <tr>
                                            <td>{{ $Pending->firstItem()+$loop->index }}</td>
                                            <td>#{{ $Pendings->invoice_no }}</td>
                                            <td>{{ $Pendings->payment->customer->name }}</td>
                                            <td>{{ date('d M y', strtotime($Pendings->invoice_date)) }}</td>
                                            <td>{{ $Pendings->user->name }}</td>
                                            <td>৳ {{ $Pendings->payment->total_amount }}</td>
                                            <td>
                                                @if ($Pendings->status == true)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('invoice.show', $Pendings->id) }}" class="btn btn-sm btn-info text-light"><i class="fa fa-eye"></i></a>
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
                        {{ $Pending->links() }}
                    </div>
                </div>
            </div>
        </div>

    @endsection

