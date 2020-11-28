@extends('backend.layouts.app')

@section('title','New Role')

@section('content')
<div class="app-title">
    <div>
        New Role</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">New Role</a></li>
    </ul>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="tile">
                <div class="action-div clearfix mb-3">
                    <a href="{{ route('roles.index')}}" class="float-right" style="text-decoration: none;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Roles</a>
                </div>

                <div class="tile-body">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Role Name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                    <h3 class="tile-title">Select related permissions</h3>
                                    @error('permissions')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                <div class="row mt-2">
                                    @foreach($pages as $page)
                                        <div class="col-md-4">
                                            <div class="tile">
                                            <h3 class="tile-title">{{ ucfirst($page->title) }}</h3>
                                            <div class="animated-checkbox">
                                                <label class="d-block">
                                                  <input type="checkbox" name="permissions[]" value="{{ $page->title }} view" {{ (collect(old('permissions'))->contains($page->title.' view')) ? 'checked':'' }}><span class="label-text">{{ $page->title }} view</span>
                                                </label>
                                                <label class="d-block">
                                                    <input type="checkbox" name="permissions[]" value="{{ $page->title }} create" {{ (collect(old('permissions'))->contains($page->title.' create')) ? 'checked':'' }}><span class="label-text">{{ $page->title }} create</span>
                                                </label>
                                                <label class="d-block">
                                                    <input type="checkbox" name="permissions[]" value="{{ $page->title }} edit" {{ (collect(old('permissions'))->contains($page->title.' edit')) ? 'checked':'' }}><span class="label-text">{{ $page->title }} edit</span>
                                                </label>
                                                <label class="d-block">
                                                    <input type="checkbox" name="permissions[]" value="{{ $page->title }} delete" {{ (collect(old('permissions'))->contains($page->title.' delete')) ? 'checked':'' }}><span class="label-text">{{ $page->title }} delete</span>
                                                </label>
                                              </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="select2">Permissions</label>
                                    <select name="permissions[]" class="form-control @error('permissions') is-invalid @enderror" id="select2" multiple="">
                                        @foreach($permissions as $permission)
                                        <option value="{{$permission->name}}" @if (old('permissions') == $permission->name) selected="selected" @endif class="border-bottom">{{ ucwords(str_replace(['-', '_'], ' ', $permission->name)) }}</option>
                                        @endforeach
                                    </select>

                                    @error('active_status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}
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
@push('js')
    <script type="text/javascript" src="{{ asset('assets/backend/js/plugins/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#select2').select2({
                placeholder: "Select permissions"
            });
        });
    </script>
@endpush
