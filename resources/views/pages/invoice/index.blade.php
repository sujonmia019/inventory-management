@extends('layouts.app')
@push('title', 'Purchase')

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
                                <th style="font-weight: 500;">Description</th>
                                <th style="font-weight: 500;">created_by</th>
                                <th style="font-weight: 500;">Status</th>
                                <th style="font-weight: 500;">Action</th>
                            </thead>
                            <tbody>
                                @if ($Invoice->count() > 0)
                                    @foreach ($Invoice as $Invoices)
                                        <tr>
                                            <td>{{ $Invoice->firstItem()+$loop->index }}</td>
                                            <td>{{ $Invoices->invoice_no }}</td>
                                            <td>customer name</td>
                                            <td>{{ date('d M y', strtotime($Invoices->invoice_date)) }}</td>
                                            <td>{{ $Invoices->description }}</td>
                                            <td>{{ $Invoices->created_by }}</td>
                                            <td>
                                                @if ($Invoices->status == true)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($Invoices->status == false)
                                                    <div class="dropdown show">
                                                        <a class="dropdown-toggle no-arrow" href="#" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="true">
                                                            <i class="icon icon-ellipse-v icon-lg text-light-gray"></i> </a>

                                                        <div class="dropdown-menu dropdown-menu-right" x-placement="top-end"
                                                            style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-84px, -79px, 0px);">

                                                            <button class="dropdown-item" style="cursor: pointer;" type="button"
                                                                onclick="delete_purchase({{ $Invoices->id }})">Delete
                                                            </button>

                                                            <form id="delete-purchase-{{ $Invoices->id }}"
                                                                action="{{ route('purchase.destroy', $Invoices->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            <a class="dropdown-item"
                                                                href="{{ route('purchase.approved', $Invoices->id) }}">
                                                                Approved
                                                            </a>

                                                        </div>
                                                    </div>
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

    @push('scripts')
        <script>
            function delete_purchase(id) {

                Swal.fire({
                    title: 'Are you sure?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Delete!'
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        event.preventDefault();
                        document.getElementById('delete-purchase-' + id).submit();
                        Swal.fire('Deleted Successfull!', '', 'success')
                    } else {
                        Swal.fire('Your data saved', '', 'info')
                    }
                })

            }

        </script>
    @endpush
