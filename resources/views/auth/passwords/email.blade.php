@extends('auth.passwords.app')
@section('title', 'Verify Email')
@section('login-content')

<div class="col-md-6 bg-white">
    <div class="login_box">
        <a href="#" class="logo_text">
            <span>PS</span> Just Log
        </a>
        <div class="login_form">
            <div class="login_form_inner">
                <h3 style="font-weight: 500;">Recover <span>your password</span></h3>
                @if ($errors->any())
                    <div class="bg-danger">
                        <ul class="m-0 list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li class="text-light py-1" style="font-weight: 300;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">
                        <input type="email" name="email" class="input-text  @error('email') is-invalid @enderror" placeholder="Email Address"  value="{{ old('email') }}" required autocomplete="email" autofocus>

                        <i class="fa fa-envelope"></i>
                        <span class="focus-border"></span>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn-md btn-theme btn-block" style="font-weight: 400;"> SEND ME EMAIL</button>
                    </div>
                    <p>Already a member?<a href="{{ route('login') }}"> Login here</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
       
@endsection
