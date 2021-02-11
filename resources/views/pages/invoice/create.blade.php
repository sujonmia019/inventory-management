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
                    <input name="invoice_no" id="invoice_no" type="text" value="{{ $Invoice_no }}" class="form-control form-control-sm rounded-0" style="background: #D8FDBA;" readonly>
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
                    <input type="text" name="product_stock" id="product_stock" class="form-control form-control-sm rounded-0" style="background: #D8FDBA;" disabled>
                </div>
                <div class="col-xl-1 col-sm-2 col-2 form-group">
                    <a style="margin-top: 25px;padding: 5px 8px;" class="btn btn-sm btn-color rounded-circle shadow-sm addEventMore"><i class="fa fa-plus fa-sm"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <form action="{{ route('invoice.store') }}" method="POST">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <th style="font-weight: 500;" width="30%">Category Name</th>
                            <th style="font-weight: 500;" width="30%">Product Name</th>
                            <th style="font-weight: 500;" width="10%">Pcs/KG</th>
                            <th style="font-weight: 500;" width="10%">Units Price</th>
                            <th style="font-weight: 500;" width="15%">Total Price</th>
                            <th style="font-weight: 500;">Action</th>
                        </thead>
                        <tbody id="addRow">

                        </tbody>
                        <tbody>
                            <tr>
                                <td colspan="4" class="text-right"><span>Discount</span></td>
                                <td>
                                    <input type="number" name="discount_price" id="discount_price" class="form-control form-control-sm" placeholder="Discount" readonly>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right">Grand Total</td>
                                <td>
                                    <input type="number" name="total_price" id="total_price" value="0" class="form-control form-control-sm" style="background: #D8FDBA;" readonly>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <textarea name="discription" class="form-control w-100" placeholder="Write description here.."></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <label class="font-weight-medium d-block">Customer Name</label>
                                    <select name="customer_name" id="customer_name" class="form-control form-control-sm select2">
                                        <option value="" selected>Select Status</option>
                                        @foreach ($Customer as $Customers)
                                        <option value="{{ $Customers->id }}">{{ $Customers->name }}</option>
                                        @endforeach
                                        <option value="0">New Customer</option>
                                    </select>
                                </td>
                                <td colspan="2">
                                    <label class="font-weight-medium">Paid Status</label>
                                    <select name="paid_status" id="paid_status" class="form-control form-control-sm">
                                        <option value="" selected>Select Status</option>
                                        <option value="0">Partial Paid</option>
                                        <option value="">Full Paid</option>
                                        <option value="">Full Due</option>
                                    </select>
                                    <input type="text" name="partial_paid" id="partial_paid" class="form-control form-control-sm" placeholder="Paid Amound">
                                </td>
                            </tr>
                            {{-- new customer  --}}
                            <tr id="new_customer_add">
                                <td colspan="1">
                                    <input type="text" name="customer_name" class="form-control form-control-sm" placeholder="Write customer name" autocomplete="off">
                                </td>
                                <td colspan="2">
                                    <input type="text" name="customer_mobile" class="form-control form-control-sm" placeholder="Write customer mobile no" autocomplete="off">
                                </td>
                                <td colspan="3">
                                    <input type="text" name="customer_address" class="form-control form-control-sm" placeholder="Write customer address" autocomplete="off">
                                </td>
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
            <input type="hidden" name="invoice_date" value="@{{ invoice_date }}">
            <input type="hidden" name="invoice_no" value="@{{ invoice_no }}">
            <td>
                <input type="hidden" name="category_id[]" value="@{{ category_id }}">
                <span class="ml-2">@{{ category_name }}</span>
            </td>
            <td>
                <input type="hidden" name="product_id[]" value="@{{ product_id }}">
                <span class="ml-2">@{{ product_name }}</span>
            </td>
            <td>
                <input type="number" min="1" class="form-control form-control-sm text-right selling_qty" name="selling_qty[]" value="1">
            </td>
            <td>
                <input type="number" class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="">
            </td>
            <td>
                <input type="number" class="form-control form-control-sm text-right selling_price" name="selling_price[]" value="0" readonly>
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

            $(document).on('keyup click', '.selling_qty,.unit_price', function(){
                var unit_price  = $(this).closest('tr').find('input.unit_price').val();
                var qty  = $(this).closest('tr').find('input.selling_qty').val();
                var total = unit_price * qty;
                $(this).closest('tr').find('input.selling_price').val(total);
                totalAmountPrice();
            });

            function totalAmountPrice(){
                var sum = 0;
                $('.selling_price').each(function(){
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

            // new customer
            $('#new_customer_add').hide();
            $('#customer_name').change(function(){
                var customer_name = $(this).val();
                if (customer_name == '0') {
                    $('#new_customer_add').show();
                }
                else{
                    $('#new_customer_add').hide();
                }
            });

            // paid status
            $('#partial_paid').hide();
            $('#paid_status').change(function(){
                var paid_status = $(this).val();
                if (paid_status == '0') {
                    $('#partial_paid').show();
                }
                else{
                    $('#partial_paid').hide();
                }
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

