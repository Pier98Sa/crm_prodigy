@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile - <strong>Marked fields(*) are required</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.user.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @if ($user->avatar)
                            <div class="form-group row">
                                <div class="offset-md-4 col-md-6">
                                    <img src="{{asset('storage/' . $user->avatar)}}" alt="img" class="img-fluid">
                                </div>
                            </div>
                        @endif
                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">Profile Picture</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" name="avatar" >
                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" disabled>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" disabled>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="my-3 col-md-7 text-left">
                                <strong>Marked fields(*) are required</strong>
                            </div>
                        </div>

                        <div class="form-group row my-2 ">
                            <div class="col-md-8 offset-md-2 ">
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary w-100" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                            Change password
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <button id="register" type="submit" class="btn btn-primary w-100">
                                            Save changes
                                        </button>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>

                        <div class="collapse" id="collapseExample">
                            <div class="card card-body col-md-8 offset-md-2 mt-2">
                                <h3>ChangePassword</h3>
                                <div class="form-group">
                                    <label for="new_password">Password (leave the field empty if you don't want to update)</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password" onchange="onEditPass()">
                                </div>
        
                                <div class="form-group">
                                    <label for="new_password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" onchange="onEditPass()">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
