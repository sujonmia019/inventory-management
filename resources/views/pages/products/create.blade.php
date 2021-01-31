@extends('layouts.app')
@push('title', 'Product Create')

    @push('styles')
        <style>
            .custom-file-inputs {
                color: transparent;
            }

            .custom-file-inputs::-webkit-file-upload-button {
                visibility: hidden;
            }

            .custom-file-inputs::before {
                content: 'Upload';
                color: black;
                display: inline-block;
                background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
                background: #003366;
                color: #f9f9f9;
                padding: 6px 10px;
                outline: none;
                white-space: nowrap;
                -webkit-user-select: none;
                cursor: pointer;
                font-size: 10pt;
            }

            .custom-file-input:active {
                outline: 0;
            }

            .custom-file-inputs:active::before {
                background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
            }

            input#uploads:focus {
                outline: 0 !important;
            }

        </style>
    @endpush
    @section('content')

        <div class="dt-content">
            <div class="card shadow-lg rounded-0">
                <div class="card-header">
                    <h3 class="m-0 d-flex justify-content-between">Add New Product
                        <a href="{{ route('product.index') }}" class="text-dark font-weight-normal">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST">
                        @csrf

                        <div class="form-row">
                            <div class="col-xl-6 col-sm-6 col-12 form-group">
                                <label>Product Name<span class="text-danger">*</span></label>
                                <input name="product_name" type="text" value="{{ old('product_name') }}"
                                    class="form-control form-control-sm rounded-0 @error('product_name') is-invalid @enderror"
                                    placeholder="full name" autocomplete="off">
                                @error('product_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-6 col-sm-6 col-12 form-group">
                                <label>Supplier<span class="text-danger">*</span></label>
                                <select name="supplier_name" class="form-control form-control-sm rounded-0">
                                    <option value="" selected>Select One</option>
                                    @foreach ($Supplier as $Suppliers)
                                        <option value="{{ $Suppliers->id }}">{{ $Suppliers->name }}</option>
                                    @endforeach
                                </select>
                                @error('supplier_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-xl-6 col-sm-6 col-12 form-group">
                                <label>Category<span class="text-danger">*</span></label>
                                <select name="category_name" class="form-control form-control-sm rounded-0">
                                    <option value="" selected>Select One</option>
                                    @foreach ($Category as $Categorys)
                                        <option value="{{ $Categorys->id }}">{{ $Categorys->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-6 col-sm-6 col-12 form-group">
                                <label>Units<span class="text-danger">*</span></label>
                                <select name="unit_name" class="form-control form-control-sm rounded-0">
                                    <option value="" selected>Select One</option>
                                    @foreach ($Unit as $Units)
                                        <option value="{{ $Units->id }}">{{ $Units->name }}</option>
                                    @endforeach
                                </select>
                                @error('unit_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="publish" id="publish">
                            <label class="form-check-label" for="publish">Publish</label>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-color rounded-0 shadow-sm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection
