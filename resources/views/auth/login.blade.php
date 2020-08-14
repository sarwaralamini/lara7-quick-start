@extends('layouts.login')

@section('content')
<form method="POST" action="{{ route('login') }}" class="login-form">
    <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
    @csrf
    <div class="form-group">
        <label class="control-label">USERNAME</label>
        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}">
        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label class="control-label">PASSWORD</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group btn-container">
        <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
        @if (session('LoginStatusError'))
            <div class="alert alert-danger text-center mt-2">
                {!! session('LoginStatusError') !!}
            </div>
        @endif
    </div>
</form>
@endsection
