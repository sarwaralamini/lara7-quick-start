@extends('backend.layouts.app')

@section('title','New Permission')

@section('content')
<div class="app-title">
    <div>
        New Permission</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">New Permission</a></li>
    </ul>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="tile">
                <div class="action-div clearfix mb-3">
                    <a href="{{ route('permissions.index')}}" class="float-right" style="text-decoration: none;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Permissions</a>
                </div>

                <div class="tile-body">
                    <form action="{{ route('permissions.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">CRUD Name</label>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Skill Title" value="{{ old('title') }}">
                                    @error('title')
                                        <div class="text-danger mb-3">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-justify text-muted font-weight-bolder" id="crudHelp" style="font-size:14px;">
                                        <span class="text-danger">**</span>  only specify crud name.
                                        It will automatically generate all related permissions for the crud.
                                        e.g. If you want a crud for categories, just put "category" as CRUD name.
                                        It will generate follwing permissions for category: category view, category add, category edit, category delete
                                    </small>
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
