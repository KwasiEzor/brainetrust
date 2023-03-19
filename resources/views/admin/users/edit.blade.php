@extends('admin.layouts.main')
@section('content')
    <div class="content py-5 px-3">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update User</h3>

                    </div>
                    <!-- /.card-header -->
                    <form action="{{route('admin.users.update',$user)}}" method="POST" class="admin-user-profile-update">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name" class="form-label mb-2">
                                    Name
                                </label>
                                <input type="text" name="name" id="name"  class="form-control w-100 @error('name') is-invalid @enderror" value="{{ $user->name}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label mb-2">
                                    Email
                                </label>
                                <input type="email"  name="email" id="email" value="{{ $user->email}}" class="form-control w-100 @error('email') is-invalid @enderror" >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <hr class="divider w-50 mx-auto bg-dark mt-4 mb-2">
                        <div class="text-center">
                            <p class="text-muted">Password update </p>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-body">
                            <div class="form-group">
                                <label for="password" class="form-label mb-2">
                                    Current Password
                                </label>
                                <input type="password" name="current_password" id="password" class="form-control w-100 @error('current_password') is-invalid @enderror">
                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label mb-2">
                                    Password
                                </label>
                                <input type="password" name="password" id="password" class="form-control w-100 @error('password') is-invalid @enderror">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class="form-label mb-2">
                                    Password confirm
                                </label>
                                <input type="password" name="password_confirmation" id="password-confirm" class="form-control w-100 @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="card-footer clearfix">
                                <button type="submit" class="btn btn-success">Update Profile</button>
                            </div>
                        </div>
                    </form>



                </div>
                <!-- /.card -->


            </div>
            <!-- /.col -->

        </div>
    </div>

@endsection
