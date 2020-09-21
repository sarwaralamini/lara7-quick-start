@extends('backend.layouts.app')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush

@section('title','Profile')

@section('content')
    <div class="app-title">
        <div>
            Profile</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
        </ul>
    </div>
    @if($user->profile != NULL)
        <div class="row">
            <div class="col-md-8">
                <div class="tile">
                    <div class="tile-title-md">
                        General Informations
                    </div>
                    <form action="{{ route('profile-update') }}" method="POST">
                        <div class="tile-body">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" type="text" placeholder="Your phone number" value="{{ old('phone', $user->profile->phone) }}">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="text" placeholder="Your email address" value="{{ old('email', $user->profile->email) }}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender">
                                            <option value="">Please select gender</option>
                                            <option value="male" @if(old('gender', $user->profile->gender) == 'male') selected="selected" @endif>Male</option>
                                            <option value="female" @if(old('gender', $user->profile->gender) == 'female') selected="selected" @endif>Female</option>
                                        </select>
                                        @error('gender')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="dob">Date of birth</label>
                                        <input class="form-control @error('dob') is-invalid @enderror" name="dob" id="dob" type="text" placeholder="Your date of birth" value="{{ old('dob', $user->profile->dob) }}">
                                        @error('dob')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nid">NID No</label>
                                        <input class="form-control @error('nid') is-invalid @enderror" name="nid" id="nid" type="text" placeholder="Your NID number" value="{{ old('nid', $user->profile->nid) }}">
                                        @error('nid')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="designation">Designation</label>
                                        <input class="form-control @error('designation') is-invalid @enderror" name="designation" id="designation" type="text" placeholder="Your designation" value="{{ old('designation', $user->profile->designation) }}">
                                        @error('designation')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" name="country" placeholder="e.g Bangladesh" class="form-control @error('country') is-invalid @enderror" value="{{ old('country', $user->profile->country) }}">
                                        @error('country')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Village/House</label>
                                        <input type="text" name="address" placeholder="Chawliapatty or 5/11,  Solimullah Road" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $user->profile->address) }}">
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>District</label>
                                        <input type="text" name="city" placeholder="e.g Dinajpur" class="form-control @error('city') is-invalid @enderror" value="{{ old('city', $user->profile->city) }}">
                                        @error('city')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Thana</label>
                                        <input type="text" name="area" placeholder="e.g Dinajpur Sadar" class="form-control @error('area') is-invalid @enderror" value="{{ old('area', $user->profile->area) }}">
                                        @error('area')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="text" name="postal_code" placeholder="e.g 5200" class="form-control @error('postal_code') is-invalid @enderror" value="{{ old('postal_code', $user->profile->postal_code) }}">
                                        @error('postal_code')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Your BIO</label>
                                        <textarea id="summernote" name="bio" class="form-control summernote @error('bio') is-invalid @enderror">{{old('bio', $user->profile->bio)}}</textarea>
                                        @error('bio')
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

                <div class="tile">
                    <div class="tile-title-md">Socials</div>
                    <form action="{{ route('profile-social-update') }}" method="POST">
                        <div class="tile-body">
                            <div class="row">
                                <div class="col-12">
                                    @csrf
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input type="text" name="facebook" placeholder="Your facebook profile link" class="form-control @error('facebook') is-invalid @enderror" value="{{ old('facebook', $user->profile->facebook) }}">
                                        @error('facebook')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input type="text" name="twitter" placeholder="Your twitter profile link" class="form-control @error('twitter') is-invalid @enderror" value="{{ old('twitter', $user->profile->twitter) }}">
                                        @error('twitter')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Skype</label>
                                        <input type="text" name="skype" placeholder="Your skype profile. e.g sarwardnj" class="form-control @error('skype') is-invalid @enderror" value="{{ old('skype', $user->profile->skype) }}">
                                        @error('skype')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Linkedin</label>
                                        <input type="text" name="linkedin" placeholder="Your linkedin profile link" class="form-control @error('linkedin') is-invalid @enderror" value="{{ old('linkedin', $user->profile->linkedin) }}">
                                        @error('linkedin')
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
                <div class="row">
                    <div class="col-12">
                        <div class="tile">
                            <div class="tile-title-md">Profile image</div>
                            <div class="profile-image-section mx-auto text-center">
                                <img src="{{ asset('storage/uploads/profile/'.$user->profile->image) }}" alt="Profile Image" class="img-fluid">
                            </div>
                            <form action="{{ route('profile-image-update') }}" method="POST" enctype="multipart/form-data">
                                <div class="tile-body">
                                    @csrf
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input class="form-control @error('image') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="image" id="image" type="file" placeholder="Your image" value="{{ old('image') }}">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
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
        </div>
    @else
        <form action="{{ route('profile-create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-warning clearfix">
                        <span style="display: inline-block;position: relative;font-size: 15px;font-weight: 700;top: 8px;">
                            No profile found. Creating new profile...
                        </span>
                        <button class="btn btn-primary float-right" type="submit">Save</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="tile">
                        <div class="tile-title-md">
                            General Informations
                        </div>
                        <div class="tile-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" type="text" placeholder="Your phone number" value="{{ old('phone') }}">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="text" placeholder="Your email address" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender">
                                            <option value="">Please select gender</option>
                                            <option value="male" @if(old('gender') == 'male') selected="selected" @endif>Male</option>
                                            <option value="female" @if(old('gender') == 'female') selected="selected" @endif>Female</option>
                                        </select>
                                        @error('gender')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="dob">Date of birth</label>
                                        <input class="form-control @error('dob') is-invalid @enderror" name="dob" id="dob" type="text" placeholder="Your date of birth" value="{{ old('dob') }}">
                                        @error('dob')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nid">NID No</label>
                                        <input class="form-control @error('nid') is-invalid @enderror" name="nid" id="nid" type="text" placeholder="Your NID number" value="{{ old('nid') }}">
                                        @error('nid')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="designation">Designation</label>
                                        <input class="form-control @error('designation') is-invalid @enderror" name="designation" id="designation" type="text" placeholder="Your designation" value="{{ old('designation') }}">
                                        @error('designation')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" name="country" placeholder="e.g Bangladesh" class="form-control @error('country') is-invalid @enderror" value="{{ old('country') }}">
                                        @error('country')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Village/House</label>
                                        <input type="text" name="address" placeholder="Chawliapatty or 5/11,  Solimullah Road" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>District</label>
                                        <input type="text" name="city" placeholder="e.g Dinajpur" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}">
                                        @error('city')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Thana</label>
                                        <input type="text" name="area" placeholder="e.g Dinajpur Sadar" class="form-control @error('area') is-invalid @enderror" value="{{ old('area') }}">
                                        @error('area')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="text" name="postal_code" placeholder="e.g 5200" class="form-control @error('postal_code') is-invalid @enderror" value="{{ old('postal_code') }}">
                                        @error('postal_code')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Your BIO</label>
                                        <textarea id="summernote" name="bio" class="form-control summernote @error('bio') is-invalid @enderror">{{old('bio')}}</textarea>
                                        @error('bio')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="tile">
                                <div class="tile-title-md">Profile image</div>
                                <div class="tile-body">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input class="form-control @error('image') is-invalid @enderror" style="padding: 0.375rem 0.75rem 2rem 0.75rem!important;" name="image" id="image" type="file" placeholder="Your image" value="{{ old('image') }}">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="tile">
                                <div class="tile-title-md">Socials</div>
                                <div class="tile-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="text" name="facebook" placeholder="Your facebook profile link" class="form-control @error('facebook') is-invalid @enderror" value="{{ old('facebook') }}">
                                                @error('facebook')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <input type="text" name="twitter" placeholder="Your twitter profile link" class="form-control @error('twitter') is-invalid @enderror" value="{{ old('twitter') }}">
                                                @error('twitter')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Skype</label>
                                                <input type="text" name="skype" placeholder="Your skype profile. e.g sarwardnj" class="form-control @error('skype') is-invalid @enderror" value="{{ old('skype') }}">
                                                @error('skype')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Linkedin</label>
                                                <input type="text" name="linkedin" placeholder="Your linkedin profile link" class="form-control @error('linkedin') is-invalid @enderror" value="{{ old('linkedin') }}">
                                                @error('linkedin')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
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

@push('js')
    <script src="{{ asset('assets/backend/js/plugins/bootstrap-datepicker.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $('#dob').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true
        });

        $(document).ready(function() {
            $('#summernote').summernote({
                height: 100
            });
        });
    </script>
@endpush
