@extends('backend.layouts.app')

@section('title','Roles')

@section('content')
    <div class="app-title">
        <div>
            Skills</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="action-div clearfix mb-3">
                        <a href="{{ route('roles.create')}}" class="float-right" style="text-decoration: none;"><i class="fa fa-plus" aria-hidden="true"></i> Create Role</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Permissions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $post)
                                    @if($post->name == "developer")
                                    @else
                                        <tr>
                                            <td>{{ ucfirst($post->name) }}</td>
                                            <td>
                                                @foreach($post->permissions as $permission)
                                                    {{ $permission->name }}
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('roles.edit', $post->id)}}" class="edit-link">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <form action="{{ route('roles.destroy',$post->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="delete-link d-inline-block border-0 bg-white">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- Data table plugin-->
    <script type="text/javascript" src="{{ asset('assets/backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $('#datatable').DataTable({
            bSort: false,
        });
    </script>
@endpush
