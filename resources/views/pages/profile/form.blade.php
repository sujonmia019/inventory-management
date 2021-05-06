@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
<style>
.dropify-wrapper .dropify-message p {
    font-size: 16px !important;
    color: #a2a2a2 !important;
}
</style>
@endpush
@section('content')

<div class="dt-content">
    <div class="col-xl-6 col-12 mx-auto">
        <div class="card shadow-lg rounded-0">
            <div class="card-header">
                <h3 class="m-0">USER INFO</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="">Avatar</label>
                        <input type="file" name="avatar" id="avatar" data-height="150" data-show-errors="true" data-allowed-file-extensions="jpg jpeg png" data-default-file="{{ isset($user) ? $user->getFirstMediaUrl('avatar') : '' }}">
                    </div>
    
                    <div class="form-group">
                        <label>Full Name</label>
                        <input name="full_name" type="text" value="{{ $user->name ?? old('full_name') }}" class="form-control form-control-sm ">
                        @error('full_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label>E-mail</label>
                        <input name="email" type="text" value="{{ $user->email ?? old('email') }}" class="form-control form-control-sm ">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input name="phone" type="number" value="{{ $user->phone ?? old('phone') }}" class="form-control form-control-sm ">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control form-control-sm ">
                            <option value="Male" {{ $user->gender=='Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $user->gender=='Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
    
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-color rounded-0 shadow-sm">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
    $('#avatar').dropify();
</script>
@endpush
