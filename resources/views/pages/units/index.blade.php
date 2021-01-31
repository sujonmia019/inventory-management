@extends('layouts.app')

@section('content')

    <div class="dt-content">
        <div class="card shadow-lg rounded-0">
            <div class="card-header">
                <h3 class="m-0 d-flex justify-content-between">Units List
                    <a href="{{ route('units.create') }}" class="btn btn-sm rounded-0 shadow-sm text-light btn-color"><i
                            class="fa fa-plus fa-sm"></i> Add New</a>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive scrollber">
                    <table class="table text-center table-bordered table-sm">
                        <thead>
                            <th class=" font-weight-semibold">ID</th>
                            <th class=" font-weight-semibold">Name</th>
                            <th class=" font-weight-semibold">Created by</th>
                            <th class=" font-weight-semibold">Status</th>
                            <th class=" font-weight-semibold">Action</th>
                        </thead>
                        <tbody>
                            @if ($Units->count() > 0)

                                @foreach ($Units as $Unit)
                                    <tr>
                                        <td>{{ $Units->firstItem() + $loop->index }}</td>
                                        <td>{{ $Unit->name }}</td>
                                        <td>{{ $Unit->user->name }}</td>
                                        <td>
                                            @if ($Unit->status == true)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown show">
                                                <a class="dropdown-toggle no-arrow" href="#" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="true">
                                                    <i class="icon icon-ellipse-v icon-lg text-light-gray"></i> </a>

                                                <div class="dropdown-menu dropdown-menu-right" x-placement="top-end"
                                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-84px, -79px, 0px);">

                                                    <a class="dropdown-item" href="{{ route('units.edit', $Unit->id) }}">
                                                        Edit </a>
                                                    @php
                                                        $Unit_Count = App\Models\Product::where('unit_id', $Unit->id)->count();
                                                    @endphp

                                                    @if ($Unit_Count < 1)
                                                        <button class="dropdown-item" style="cursor: pointer;" type="button"
                                                            onclick="delete_units({{ $Unit->id }})">Delete</button>

                                                        <form id="delete-units-{{ $Unit->id }}"
                                                            action="{{ route('units.destroy', $Unit->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    @endif

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            @else
                                <tr>
                                    <td colspan="7" class="text-center">Units Not Found</td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    {{ $Units->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function delete_units(id) {

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
                    document.getElementById('delete-units-' + id).submit();
                    Swal.fire('Deleted Successfull!', '', 'success')
                } else {
                    Swal.fire('Your data saved', '', 'info')
                }
            })

        }

    </script>
@endpush
