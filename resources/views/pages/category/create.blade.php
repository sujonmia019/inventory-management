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
            <h3 class="m-0 d-flex justify-content-between">Add New Category
                <a href="{{ route('category.index') }}" class="text-dark font-weight-normal">Back</a>
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="POST" class="w-50 mx-auto">
            @csrf
                <div class="form-group">
                    <label>Category Name<span class="text-danger">*</span></label>
                    <input name="category_name" type="text" value="{{ old('category_name') }}" class="form-control form-control-sm rounded-0 @error('category_name') is-invalid @enderror" placeholder="category name" autocomplete="off">
                    @error('category_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
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
