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
                <a href="{{ route('purchase.index') }}" class="text-dark font-weight-normal">Back</a>
            </h3>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col-xl-4 col-sm-6 col-12 form-group">
                    <label>Purchase Date<span class="text-danger">*</span></label>
                    <input type="text" id="purchase_date" name="purchase_date" class="rounded-0 datepicker" placeholder="dd--mm--yy" autocomplete="off">
                    @error('purchase_date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-xl-4 col-sm-6 col-12 form-group">
                    <label>Purchase No<span class="text-danger">*</span></label>
                    <input name="purchase_no" id="purchase_no" type="text" value="{{ old('Purchase_no') }}" class="form-control form-control-sm rounded-0" placeholder="purchase no" autocomplete="off">
                </div>
                <div class="col-xl-4 col-sm-12 col-12 form-group">
                    <label>Supplier<span class="text-danger">*</span></label>
                    <select name="supplier_id" id="supplier_id" class="form-control form-control-sm rounded-0 select2">
                        <option value="">Select Supplier</option>
                        @foreach ($Supplier as $Suppliers)
                        <option value="{{ $Suppliers->id }}">{{ $Suppliers->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="col-xl-4 col-sm-6 col-12 form-group">
                    <label>Category<span class="text-danger">*</span></label>
                    <select name="category_id" id="category_id" class="select2 form-control form-control-sm rounded-0">
                        {{-- ajax option call  --}}
                    </select>
                </div>
                <div class="col-xl-4 col-sm-6 col-12 form-group">
                    <label>Product Name<span class="text-danger">*</span></label>
                    <select name="product_id" id="product_id" class="select2 form-control form-control-sm rounded-0">
                        {{-- ajax option call  --}}
                    </select>
                </div>
                <div class="col-xl-4 col-sm-6 col-12 form-group">
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
            <input type="hidden" name="purchase_date[]" value="@{{ purchase_date }}">
            <input type="hidden" name="purchase_no[]" value="@{{ purchase_no }}">
            <input type="hidden" name="supplier_id[]" value="@{{ supplier_id }}">
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
                var purchase_date = $('#purchase_date').val();
                var purchase_no = $('#purchase_no').val();
                var supplier_id = $('#supplier_id').val();
                var category_id = $('#category_id').val();
                var category_name = $('#category_id').find('option:selected').text();
                var product_id = $('#product_id').val();
                var product_name = $('#product_id').find('option:selected').text();

                if(purchase_date == ''){
                    toastr.error('Purchase date is required');
                    return false;
                }
                if(purchase_no == ''){
                    toastr.error('Purchase no is required');
                    return false;
                }
                if(supplier_id == ''){
                    toastr.error('Supplier is required');
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
                    purchase_date:purchase_date,
                    purchase_no:purchase_no,
                    supplier_id:supplier_id,
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

            // supplier wise category name ajax
            $('#supplier_id').change(function(){
                var supplier_id = $(this).val();
                $.ajax({
                    url: "{{ route('categories') }}",
                    method: "GET",
                    data: {supplier_id:supplier_id},
                    success:function(response){
                        var html = "<option value=''>Select Category</option>";
                        $.each(response, function(key,value){
                            html += '<option value="'+value.category_id+'">'+value.category.name+'</option>';
                        });

                        $('#category_id').html(html);
                    }
                });
            });

            // Category wise product name ajax
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

            // datepicker
            $('.datepicker').datepicker({
                uiLibrary: 'bootstrap4'
            });

            // select2
            $('.select2').select2();


        })(jQuery);

    </script>
@endpush

