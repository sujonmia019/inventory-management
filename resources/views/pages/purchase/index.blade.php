@extends('layouts.app')
@push('title','Purchase')

@section('content')

<div class="dt-content">
    <div class="card shadow-lg rounded-0">
        <div class="card-header">
            <h3 class="m-0 d-flex justify-content-between">Purchase List
                <a href="{{ route('purchase.create') }}" class="btn btn-sm rounded-0 shadow-sm text-light btn-color"><i class="fa fa-plus fa-sm"></i>  Add New</a>
            </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive scrollber">
                <table class="table text-center table-bordered table-sm">
                    <thead>
                        <th style="font-weight: 500;">Purchase No</th>
                        <th style="font-weight: 500;">Product Name</th>
                        <th style="font-weight: 500;">Supplier</th>
                        <th style="font-weight: 500;">Category</th>
                        <th style="font-weight: 500;">Quantity</th>
                        <th style="font-weight: 500;">Status</th>
                        <th style="font-weight: 500;">Created_by</th>
                        <th style="font-weight: 500;">Action</th>
                    </thead>
                    <tbody>
                        @if ($Purchase->count() > 0)

                        @foreach ($Purchase as $Purchases)
                        <tr>
                            <td>{{ $Purchases->purchase_no }}</td>
                            <td>{{ $Purchases->product_id }}</td>
                            <td>{{ $Purchases->supplier_id }}</td>
                            <td>{{ $Purchases->category_id }}</td>
                            <td>{{ $Purchases->buying_qty }}</td>
                            <td>
                                @if ($Purchases->status == true)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Pending</span>
                                @endif
                            </td>
                            <td>users</td>
                            <td>
                                <div class="dropdown show">
                                    <a class="dropdown-toggle no-arrow" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                      <i class="icon icon-ellipse-v icon-lg text-light-gray"></i> </a>

                                    <div class="dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-84px, -79px, 0px);">

                                      <a class="dropdown-item" href="{{ route('purchase.edit', $Purchases->id) }}"> Edit </a>

                                        {{-- <button class="dropdown-item" style="cursor: pointer;" type="button" onclick="delete_purchase({{ $purchases->id }})">Delete
                                        </button>

                                        <form id="delete-purchase-{{ $purchases->id }}" action="{{ route('product.destroy',$purchases->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form> --}}
                                    </div>
                                </div>
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
                {{ $Purchase->links() }}
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        function delete_product(id){

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
                    document.getElementById('delete-product-'+id).submit();
                    Swal.fire('Deleted Successfull!', '', 'success')
                } else  {
                    Swal.fire('Your data saved', '', 'info')
                }
            })

        }
    </script>
@endpush
