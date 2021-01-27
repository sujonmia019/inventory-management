@extends('layouts.app')
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
            <h3 class="m-0 d-flex justify-content-between">Supplier Update
                <a href="{{ route('supplier.index') }}" class="text-dark font-weight-normal">Back</a>
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('supplier.update',$Edit->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="form-row">
                    <div class="col-xl-12 col-sm-12 col-12 form-group">
                        <div class="text-center">
                            @if ($Edit->avatar)
                            <img id="oneImage" src="assets/image/supplier/{{ $Edit->avatar }}" class="rounded-circle " style="width: 100px; height: 100px;" alt="">
                            @else
                            <img id="oneImage" src="assets/img/placeholder.jpg" class="rounded-circle " style="width: 100px; height: 100px;" alt="">
                            @endif
                        </div>
                        <div class="text-center mt-3">
                            <input id="uploads" type="file" name="photo" style="max-width: 6%;" class="custom-file-inputs">
                        </div>
                    </div>

                    <div class="col-xl-6 col-sm-6 col-12 form-group">
                        <label>Full Name</label>
                        <input name="full_name" type="text" value="{{ $Edit->name }}" class="form-control form-control-sm rounded-0 @error('full_name') is-invalid @enderror" placeholder="full name">
                        @error('full_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-xl-6 col-sm-6 col-12 form-group">
                        <label>Mobile</label>
                        <input name="mobile" type="number" value="{{ $Edit->mobile }}" class="form-control form-control-sm rounded-0 @error('mobile') is-invalid @enderror" placeholder="mobile number">
                        @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-xl-6 col-sm-6 col-12 form-group">
                        <label>E-mail<span style="font-size: 10px;">(Optional)</span></label>
                        <input name="email" type="email" value="{{ $Edit->email }}" class="form-control form-control-sm rounded-0" placeholder="email">
                    </div>
                    <div class="col-xl-6 col-sm-6 col-12 form-group">
                        <label>Address</label>
                        <input name="address" type="text" value="{{ $Edit->address }}" class="form-control form-control-sm rounded-0 @error('address') is-invalid @enderror" placeholder="address">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-xl-2 col-sm-2 col-4 form-group mx-auto">
                        <button type="submit" class="btn btn-sm btn-block btn-color rounded-0 shadow-sm">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
            $('#oneImage').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

        $("#uploads").change(function() {
        readURL(this);
    });
    </script>
@endpush
