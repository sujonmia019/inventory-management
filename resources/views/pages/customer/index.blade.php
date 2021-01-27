@extends('layouts.app')

@section('content')

<div class="dt-content">
    <div class="card shadow-lg rounded-0">
        <div class="card-header">
            <h3 class="m-0 d-flex justify-content-between">Customer List
                <a href="{{ route('customer.create') }}" class="btn btn-sm rounded-0 shadow-sm text-light btn-color"><i class="fa fa-plus fa-sm"></i>  Add New</a>
            </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive scrollber">
                <table class="table text-center table-bordered table-sm">
                    <thead>
                        <th class=" font-weight-semibold">ID</th>
                        <th class=" font-weight-semibold">Avatar</th>
                        <th class=" font-weight-semibold">Name</th>
                        <th class=" font-weight-semibold">Email</th>
                        <th class=" font-weight-semibold">Mobile</th>
                        <th class=" font-weight-semibold">Status</th>
                        <th class=" font-weight-semibold">Action</th>
                    </thead>
                    <tbody>
                        @if ($Customer->count() > 0)

                        @foreach ($Customer as $Customers)
                        <tr>
                            <td>{{ $Customer->firstItem()+$loop->index }}</td>
                            <td>
                                <img class="rounded-circle" style="width: 40px; height: 40px;" src="{{ asset('assets/image/customer/'.$Customers->avatar) }}" alt="">
                            </td>
                            <td>{{ $Customers->name }}</td>
                            <td>{{ $Customers->email }}</td>
                            <td>{{ $Customers->mobile }}</td>
                            <td>
                                @if ($Customers->status == true)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Pending</span>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown show">
                                    <a class="dropdown-toggle no-arrow" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                      <i class="icon icon-ellipse-v icon-lg text-light-gray"></i> </a>

                                    <div class="dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-84px, -79px, 0px);">

                                      <a class="dropdown-item" href="{{ route('customer.show', $Customers->id) }}" > View </a>

                                      <a class="dropdown-item" href="{{ route('customer.edit', $Customers->id) }}"> Edit </a>

                                        <button class="dropdown-item" style="cursor: pointer;" type="button" onclick="delete_customer({{ $Customers->id }})">Delete
                                        </button>

                                        <form id="delete-customer-{{ $Customers->id }}" action="{{ route('customer.destroy',$Customers->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>


                                    </div>
                                  </div>
                            </td>
                        </tr>
                        @endforeach

                        @else
                        <tr>
                            <td colspan="7" class="text-center">Customer Not Found</td>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $Customer->links() }}
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        function delete_customer(id){

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
                    document.getElementById('delete-customer-'+id).submit();
                    Swal.fire('Deleted Successfull!', '', 'success')
                } else  {
                    Swal.fire('Your data saved', '', 'info')
                }
            })

        }
    </script>
@endpush
