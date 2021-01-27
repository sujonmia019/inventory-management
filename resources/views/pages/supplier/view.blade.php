@extends('layouts.app')

@section('content')

<div class="dt-content">
    <div class="card shadow-lg rounded-0">
        <div class="card-header">
            <h3 class="m-0 d-flex justify-content-between">Supplier
                <a href="{{ route('supplier.index') }}" class="text-dark font-weight-normal"> Back</a>
            </h3>
        </div>
        <div class="card-body">
            <div class="avatar text-center">
                @if ($SupplierInfo->avatar)
                    <img src="assets/image/supplier/{{ $SupplierInfo->avatar }}" class="rounded-circle shadow-lg" style="width: 120px; height: 120px;" alt="">
                @else
                    <img src="assets/img/placeholder.jpg" class="rounded-circle shadow-lg" style="width: 120px; height: 120px;" alt="">
                @endif
            </div>
            <div class="info d-flex justify-content-center mt-3">
                <table class="table table-bordered table-striped table-sm w-50">
                    <tr>
                        <td class="w-50">Your Name</td>
                        <td class="w-50">{{ $SupplierInfo->name }}</td>
                    </tr>
                    <tr>
                        <td class="w-50">E-mail</td>
                        <td class="w-50">
                            @if ($SupplierInfo->email !=NULL)
                                {{ $SupplierInfo->email }}
                            @else
                                Undefind
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="w-50">Mobile</td>
                        <td class="w-50">{{ $SupplierInfo->mobile }}</td>
                    </tr>
                    <tr>
                        <td class="w-50">Address</td>
                        <td class="w-50">{{ $SupplierInfo->address }}</td>
                    </tr>
                    <tr>
                        <td class="w-50">Status</td>
                        <td class="w-50">
                            @if ($SupplierInfo->status == true)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Pending</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
