@extends('backend.layouts.app')

@section('title','Update Password')

@section('content')
    <div class="app-title">
        <div>
            Update password</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('password') }}">Update password</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="tile">
                <div class="tile-title-md">
                    Update Password
                </div>
                <div class="tile-body">
                    <form action="{{ route('password-update') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input class="form-control @error('current_password') is-invalid @enderror" name="current_password" id="current_password" type="password" placeholder="Your Current Password" value="{{ old('current_password') }}">
                                    @error('current_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="new_password" type="password" placeholder="New Password" value="{{ old('new_password') }}">
                                    @error('new_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="confirm_password">Confirm New Password</label>
                                    <input class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" id="confirm_password" type="password" placeholder="Confirm New Password" value="{{ old('confirm_password') }}">
                                    @error('confirm_password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="tile-footer clearfix">
                            <button class="btn btn-primary float-right" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
