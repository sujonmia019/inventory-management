@extends('layouts.app')
@push('title', 'Invoice Pending')

    @section('content')

        <div class="dt-content">
            <div class="card shadow-lg rounded-0">
                <div class="card-header">
                    <h3 class="m-0">Invoice Pending
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

                                                <div>
                                                    <a href="{{ route('invoice.approve.id', $Pendings->id) }}" style="cursor: pointer;" class="border-0 bg-success text-light p-1" data-toggle="tooltip" data-placement="top" title="invoice active"> <i class="fa fa-check fa-sm"></i></a>

                                                    <button onclick="delete_invoice({{ $Pendings->id }})" style="cursor: pointer;" class="bg-danger border-0 text-light px-2 py-1" data-toggle="tooltip" data-placement="top" title="invoice delete"><i class="fa fa-trash-alt fa-sm"></i></button>

                                                    <form id="delete-invoice-form-{{ $Pendings->id }}" action="{{ route('invoice.destroy', $Pendings->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                </div>

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

    @push('scripts')
        <script>
            function delete_invoice(id) {

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
                        document.getElementById('delete-invoice-form-' + id).submit();
                        Swal.fire('Deleted Successfull!', '', 'success')
                    } else {
                        Swal.fire('Your data saved', '', 'info')
                    }
                });

            }


        </script>
    @endpush

