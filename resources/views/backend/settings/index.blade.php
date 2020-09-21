@extends('backend.layouts.app')

@section('title','Settings')

@section('content')
    <div class="app-title">
        <div>
            Settings</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('settings') }}">Settings</a></li>
        </ul>
    </div>
    @if($setting != NULL)
        <div class="row">
            <div class="col-md-8">
                <div class="tile">
                    <div class="tile-title-md">
                        SEO Settings
                    </div>
                    <form action="{{ route('settings-update') }}" method="POST">
                        <div class="tile-body">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="site_title">Site Title</label>
                                        <input class="form-control @error('site_title') is-invalid @enderror" name="site_title" id="site_title" type="text" placeholder="Site Title" value="{{ old('site_title', $setting->site_title) }}">
                                        @error('site_title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="site_author">Site Author</label>
                                        <input class="form-control @error('site_author') is-invalid @enderror" name="site_author" id="site_author" type="text" placeholder="Site Author" value="{{ old('site_author', $setting->site_author) }}">
                                        @error('site_author')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nid">Site URL</label>
                                        <input class="form-control @error('site_url') is-invalid @enderror" name="site_url" id="site_url" type="text" placeholder="Site URL" value="{{ old('site_url', $setting->site_url) }}">
                                        @error('site_url')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Site Type</label>
                                        <input type="text" name="site_type" placeholder="Site Type" class="form-control @error('site_type') is-invalid @enderror" value="{{ old('site_type', $setting->site_type) }}">
                                        @error('site_type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Robot</label>
                                        <input type="text" name="site_robots" placeholder="Site Robot" class="form-control @error('site_robots') is-invalid @enderror" value="{{ old('site_robots', $setting->site_robots) }}">
                                        @error('site_robots')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Facebook App ID</label>
                                        <input type="text" name="site_app_id" placeholder="Faceboo App ID" class="form-control @error('site_app_id') is-invalid @enderror" value="{{ old('site_app_id', $setting->site_app_id) }}">
                                        @error('site_app_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Twitter Author</label>
                                        <input type="text" name="site_creator" placeholder="Twitter Author" class="form-control @error('site_creator') is-invalid @enderror" value="{{ old('site_creator', $setting->site_creator) }}">
                                        @error('site_creator')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Twitter Card</label>
                                        <select name="site_card" class="form-control @error('site_card') is-invalid @enderror">
                                            <option value="">Selelct Twitter Card</option>
                                            <option value="summary" @if(old('site_card', $setting->site_card) == 'summary') selected="selected" @endif>Summary</option>
                                            <option value="summary_large_image" @if(old('site_card', $setting->site_card) == 'summary_large_image') selected="selected" @endif>Summary Large Image</option>
                                            <option value="app" @if(old('site_card', $setting->site_card) == 'app') selected="selected" @endif>App</option>
                                            <option value="player" @if(old('site_card', $setting->site_card) == 'player') selected="selected" @endif>Player</option>
                                        </select>
                                        @error('site_card')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Site Keywords</label>
                                        <input type="text" name="site_keywords" placeholder="Site Keywords" class="form-control @error('site_keywords') is-invalid @enderror" value="{{ old('site_keywords', $setting->site_keywords) }}">
                                        @error('site_keywords')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Site Description</label>
                                        <textarea name="site_description" class="form-control @error('site_description') is-invalid @enderror">{{old('site_description', $setting->site_description)}}</textarea>
                                        @error('site_description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tile-footer clearfix">
                            <button class="btn btn-primary float-right" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tile">
                    <div class="tile-title-md">SEO Image Settings</div>
                    <form action="{{ route('settings-image-update') }}" method="POST" enctype="multipart/form-data">
                        <div class="tile-body">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SEO Image Width</label>
                                        <input type="text" name="site_image_width" placeholder="e.g 600" class="form-control @error('site_image_width') is-invalid @enderror" value="{{ old('site_image_width', $setting->site_image_width) }}">
                                        @error('site_image_width')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SEO Image Height</label>
                                        <input type="text" name="site_image_height" placeholder="e.g 315" class="form-control @error('site_image_height') is-invalid @enderror" value="{{ old('site_image_height', $setting->site_image_height) }}">
                                        @error('site_image_height')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{ asset('storage/uploads/seo/'.$setting->site_image) }}" alt="SEO Image" class="img-fluid">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="image">SEO Image</label>
                                        <input class="form-control @error('site_image') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="site_image" id="site_image" type="file" placeholder="SEO Image" value="{{ old('site_image') }}">
                                        @error('site_image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
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
    @else
        <form action="{{ route('settings-create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-warning clearfix">
                        <span style="display: inline-block;position: relative;font-size: 15px;font-weight: 700;top: 8px;">
                            No previous settings found. Creating new settings...
                        </span>
                        <button class="btn btn-primary float-right" type="submit">Save</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="tile">
                        <div class="tile-title-md">
                            SEO Settings
                        </div>
                        <div class="tile-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="site_title">Site Title</label>
                                        <input class="form-control @error('site_title') is-invalid @enderror" name="site_title" id="site_title" type="text" placeholder="Site Title" value="{{ old('site_title') }}">
                                        @error('site_title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="site_author">Site Author</label>
                                        <input class="form-control @error('site_author') is-invalid @enderror" name="site_author" id="site_author" type="text" placeholder="Site Author" value="{{ old('site_author') }}">
                                        @error('site_author')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nid">Site URL</label>
                                        <input class="form-control @error('site_url') is-invalid @enderror" name="site_url" id="site_url" type="text" placeholder="Site URL" value="{{ old('site_url') }}">
                                        @error('site_url')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Site Type</label>
                                        <input type="text" name="site_type" placeholder="Site Type" class="form-control @error('site_type') is-invalid @enderror" value="{{ old('site_type') }}">
                                        @error('site_type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Robot</label>
                                        <input type="text" name="site_robots" placeholder="Site Robot" class="form-control @error('site_robots') is-invalid @enderror" value="{{ old('site_robots') }}">
                                        @error('site_robots')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Facebook App ID</label>
                                        <input type="text" name="site_app_id" placeholder="Faceboo App ID" class="form-control @error('site_app_id') is-invalid @enderror" value="{{ old('site_app_id') }}">
                                        @error('site_app_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Twitter Author</label>
                                        <input type="text" name="site_creator" placeholder="Twitter Author" class="form-control @error('site_creator') is-invalid @enderror" value="{{ old('site_creator') }}">
                                        @error('site_creator')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Twitter Card</label>
                                        <select name="site_card" class="form-control @error('site_card') is-invalid @enderror">
                                            <option value="">Selelct Twitter Card</option>
                                            <option value="summary" @if(old('site_card') == 'summary') selected="selected" @endif>Summary</option>
                                            <option value="summary_large_image" @if(old('site_card') == 'summary_large_image') selected="selected" @endif>Summary Large Image</option>
                                            <option value="app" @if(old('site_card') == 'app') selected="selected" @endif>App</option>
                                            <option value="player" @if(old('site_card') == 'player') selected="selected" @endif>Player</option>
                                        </select>
                                        @error('site_card')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Site Keywords</label>
                                        <input type="text" name="site_keywords" placeholder="Site Keywords" class="form-control @error('site_keywords') is-invalid @enderror" value="{{ old('site_keywords') }}">
                                        @error('site_keywords')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Site Description</label>
                                        <textarea name="site_description" class="form-control @error('site_description') is-invalid @enderror">{{old('site_description')}}</textarea>
                                        @error('site_description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tile">
                        <div class="tile-title-md">SEO Image Settings</div>
                        <div class="tile-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SEO Image Width</label>
                                        <input type="text" name="site_image_width" placeholder="e.g 600" class="form-control @error('site_image_width') is-invalid @enderror" value="{{ old('site_image_width') }}">
                                        @error('site_image_width')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SEO Image Height</label>
                                        <input type="text" name="site_image_height" placeholder="e.g 315" class="form-control @error('site_image_height') is-invalid @enderror" value="{{ old('site_image_height') }}">
                                        @error('site_image_height')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="image">SEO Image</label>
                                        <input class="form-control @error('site_image') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="site_image" id="site_image" type="file" placeholder="SEO Image" value="{{ old('site_image') }}">
                                        @error('site_image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection
