@extends('backend.layouts.app')

@section('title','Permissions')

@section('content')
    <div class="app-title">
        <div>
            Permissions</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissions</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="action-div clearfix mb-3">
                        <a href="{{ route('permissions.create')}}" class="float-right" style="text-decoration: none;"><i class="fa fa-plus" aria-hidden="true"></i> Create Permission</a>
                    </div>
                    <div class="row">
                        @foreach($pages as $page)
                            <div class="col-md-4">
                                <div class="tile">
                                <h3 class="tile-title">{{ ucfirst($page->title) }}</h3>
                                <ul style="list-style-type: none;">
                                    <li><i class="icon fa fa-long-arrow-right"></i> {{ $page->title }} view</li>
                                    <li><i class="icon fa fa-long-arrow-right"></i> {{ $page->title }} create</li>
                                    <li><i class="icon fa fa-long-arrow-right"></i> {{ $page->title }} edit</li>
                                    <li><i class="icon fa fa-long-arrow-right"></i> {{ $page->title }} delete</li>
                                </ul>
                                </div>
                            </div>
                        @endforeach
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
