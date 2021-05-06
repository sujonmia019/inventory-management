@extends('layouts.app')

@section('content')

<div class="dt-content">
    <div class="col-xl-6 col-12 mx-auto">
        <div class="card shadow-lg rounded-0">
            <div class="card-header">
                <h3 class="m-0">UPDATE PASSWORD</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('profile.password.update', $user->id) }}" method="POST">
                @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Current Password</label>
                        <input name="current_password" type="text" class="form-control form-control-sm" required autocomplete="off">
                        @error('current_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>New Password</label>
                        <input name="new_password" type="text" class="form-control form-control-sm" required autocomplete="off">
                        @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label>confirm Password</label>
                        <input name="confirm_password" type="text" class="form-control form-control-sm" required autocomplete="off">
                        @error('confirm_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
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

