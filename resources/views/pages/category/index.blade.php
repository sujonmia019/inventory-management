@extends('layouts.app')

@section('content')

<div class="dt-content">
    <div class="card shadow-lg rounded-0">
        <div class="card-header">
            <h3 class="m-0 d-flex justify-content-between">Category List
                <a href="{{ route('category.create') }}" class="btn btn-sm rounded-0 shadow-sm text-light btn-color"><i class="fa fa-plus fa-sm"></i>  Add New</a>
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
                        @if ($Category->count() > 0)

                        @foreach ($Category as $Categorys)
                        <tr>
                            <td>{{ $Category->firstItem()+$loop->index }}</td>
                            <td>{{ $Categorys->name }}</td>
                            <td>{{ $Categorys->user->name }}</td>
                            <td>
                                @if ($Categorys->status == true)
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

                                      <a class="dropdown-item" href="{{ route('category.edit', $Categorys->id) }}"> Edit </a>

                                        <button class="dropdown-item" style="cursor: pointer;" type="button" onclick="delete_Category({{ $Categorys->id }})">Delete
                                        </button>

                                        <form id="delete-Category-{{ $Categorys->id }}" action="{{ route('category.destroy',$Categorys->id) }}" method="POST">
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
                            <td colspan="7" class="text-center">Category Not Found</td>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                {{ $Category->links() }}
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        function delete_Category(id){

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
                    document.getElementById('delete-Category-'+id).submit();
                    Swal.fire('Deleted Successfull!', '', 'success')
                } else  {
                    Swal.fire('Your data saved', '', 'info')
                }
            })

        }
    </script>
@endpush
