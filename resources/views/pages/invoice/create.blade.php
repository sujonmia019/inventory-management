@extends('layouts.app')
@push('title','Purchase Create')

@push('styles')
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<style>
.my-class{
    padding: 50px !important;
}
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
            <h3 class="m-0 d-flex justify-content-between">Add New Purchase
                <a href="{{ route('invoice.index') }}" class="text-dark font-weight-normal">Back</a>
            </h3>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col-xl-2 col-sm-2 col-3 form-group">
                    <label>Invoice No<span class="text-danger">*</span></label>
                    <input name="invoice_no" id="invoice_no" type="text" value="{{ old('invoice_no') }}" class="form-control form-control-sm rounded-0" style="background: #D8FDBA;">
                </div>

                <div class="col-xl-2 col-sm-5 col-5 form-group">
                    <label>Invoice Date<span class="text-danger">*</span></label>
                    <input type="text" id="invoice_date" name="invoice_date" class="rounded-0 datepicker" placeholder="dd--mm--yy" autocomplete="off">
                    @error('invoice_date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-xl-3 col-sm-5 col-4 form-group">
                    <label>Category Name<span class="text-danger">*</span></label>
                    <select name="category_id" id="category_id" class="form-control form-control-sm rounded-0 select2">
                        <option value="">Select Category</option>
                        @foreach ($Category as $Categories)
                        <option value="{{ $Categories->id }}">{{ $Categories->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-xl-3 col-sm-7 col-8 form-group">
                    <label>Product Name<span class="text-danger">*</span></label>
                    <select name="product_id" id="product_id" class="product_id select2 form-control form-control-sm rounded-0">
                        {{-- ajax option call  --}}
                    </select>
                </div>
                <div class="col-xl-1 col-sm-2 col-2 form-group">
                    <label>Stock</label>
                    <input type="text" name="product_stock" id="product_stock" class="form-control form-control-sm rounded-0" style="background: #D8FDBA;">
                </div>
                <div class="col-xl-1 col-sm-2 col-2 form-group">
                    <a style="margin-top: 25px;padding: 5px 8px;" class="btn btn-sm btn-color rounded-circle shadow-sm addEventMore"><i class="fa fa-plus fa-sm"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <form action="{{ route('purchase.store') }}" method="POST">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <th style="font-weight: 500;">Category</th>
                            <th style="font-weight: 500;">Product Name</th>
                            <th style="font-weight: 500;" width="7%">Unit</th>
                            <th style="font-weight: 500;" width="10%">Units Price</th>
                            <th style="font-weight: 500;">Description</th>
                            <th style="font-weight: 500;" width="10%">Total Price</th>
                            <th style="font-weight: 500;">Action</th>
                        </thead>
                        <tbody id="addRow">

                        </tbody>
                        <tbody>
                            <tr>
                                <td colspan="5"></td>
                                <td>
                                    <input type="number" name="total_price" id="total_price" value="0" class="form-control form-control-sm rounded-0" style="background: #D8FDBA;" readonly>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-color btn-click rounded-0 shadow-sm">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

    <script id="entry-template" type="text/x-handlebars-template">
        <tr class="deleteAddMoreItem" id="deleteAddMoreItem">
            <input type="hidden" name="invoice_date[]" value="@{{ invoice_date }}">
            <input type="hidden" name="invoice_no[]" value="@{{ invoice_no }}">
            <td>
                <input type="hidden" name="category_id[]" value="@{{ category_id }}">
                @{{ category_name }}
            </td>
            <td>
                <input type="hidden" name="product_id[]" value="@{{ product_id }}">
                @{{ product_name }}
            </td>
            <td>
                <input type="number" min="1" class="form-control form-control-sm text-right buying_qty" name="buying_qty[]" value="1">
            </td>
            <td>
                <input type="number" class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="">
            </td>
            <td>
                <input type="text" name="description[]" class="form-control form-control-sm">
            </td>
            <td>
                <input type="number" class="form-control form-control-sm text-right buying_price" name="buying_price[]" value="0" readonly>
            </td>
            <td>
                <a style="padding: 5px 8px;" class="btn btn-sm btn-danger text-light rounded-circle shadow-sm addEvenRemoved"><i class="fa fa-minus fa-sm"></i></a>
            </td>
        </tr>
    </script>

    <script>
        $(document).ready(function(){

            $('.addEventMore').on('click', function(){
                var invoice_date = $('#invoice_date').val();
                var invoice_no = $('#invoice_no').val();
                var category_id = $('#category_id').val();
                var category_name = $('#category_id').find('option:selected').text();
                var product_id = $('#product_id').val();
                var product_name = $('#product_id').find('option:selected').text();

                if(invoice_no == ''){
                    toastr.error('Invoice no is required');
                    return false;
                }
                if(invoice_date == ''){
                    toastr.error('Invoice date is required');
                    return false;
                }
                if(category_id == ''){
                    toastr.error('Category is required');
                    return false;
                }
                if(product_id == ''){
                    toastr.error('Product is required');
                    return false;
                }

                var source = document.getElementById("entry-template").innerHTML;
                var template = Handlebars.compile(source);
                var data = {
                    invoice_date:invoice_date,
                    invoice_no:invoice_no,
                    category_id:category_id,
                    category_name:category_name,
                    product_id:product_id,
                    product_name:product_name
                }

                var html = template(data);
                $('#addRow').append(html);
            });

            $(document).on('click', '.addEvenRemoved', function(){
                $(this).closest('.deleteAddMoreItem').remove();
                totalAmountPrice();
            });

            $(document).on('keyup click', '.buying_qty,.unit_price', function(){
                var unit_price  = $(this).closest('tr').find('input.unit_price').val();
                var qty  = $(this).closest('tr').find('input.buying_qty').val();
                var total = unit_price * qty;
                $(this).closest('tr').find('input.buying_price').val(total);
                totalAmountPrice();
            });

            function totalAmountPrice(){
                var sum = 0;
                $('.buying_price').each(function(){
                    var value = $(this).val();
                    if(!isNaN(value) && value.length !=0){
                        sum += parseFloat(value);
                    }
                });
                $('#total_price').val(sum);
            }

        });
    </script>


    <script>
        (function($){


            // category wise product name ajax
            $('#category_id').change(function(){
                var category_id = $(this).val();
                $.ajax({
                    url: "{{ route('products') }}",
                    method: "GET",
                    data: {category_id:category_id},
                    success:function(response){
                        var html = "<option value=''>Select Product</option>";
                        $.each(response, function(key,value){
                            html += '<option value="'+value.id+'">'+value.name+'</option>';
                        });

                        $('#product_id').html(html);
                    }
                });
            });

            // product wise product stock ajax
            $('.product_id').change(function(){
                var product_id = $(this).val();
                $.ajax({
                    url: "{{ route('product.stock') }}",
                    method: 'GET',
                    data: {product_id:product_id},
                    success:function(response){
                        $('#product_stock').val(response);
                    }
                });
            });

            // datepicker
            $('.datepicker').datepicker({
                uiLibrary: 'bootstrap4'
            });

            // select2
            $('.select2').select2();


        })(jQuery);

    </script>
@endpush

