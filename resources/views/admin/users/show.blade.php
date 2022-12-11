    @extends('admin.layouts.main')
    @section('content')
        <div class="content py-5 px-3">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h2 class="card-title">Show User details</h2>

                        </div>
                        <!-- /.card-header -->

                            <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-header">
                                            <h5>{{$user->name}}</h5>
                                        </div>
                                        <div class="card-body">
                                        <p>Email : <a href="mailto:{{$user->email}}" class="link">{{$user->email}}</a></p>
                                            <p>Roles :
                                                @forelse($user->roles as $role)
                                                    <span class="badge bg-primary py-1 px-2">{{ucwords($role->name)}}</span>
                                                @empty
                                                     <span class="text-muted">Not available</span>
                                                @endforelse

                                            </p>
                                            <p>Permissions :
    {{--                                            {{dd($user->permissions)}}--}}
                                                @forelse($user->permissions as $permission)
                                                    <span class="badge bg-warning py-1 px-2">{{ucwords($permission->name)}}</span>
                                                @empty
                                                    <span class="text-muted">Not available</span>
                                                @endforelse

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-auto">
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-header">
                                            <h5>Manage Roles</h5>
                                        </div>
                                        <form action="{{route('admin.users.add-roles',$user)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <select class="form-control w-100" multiple aria-label="multiple select" name="roles[]">
                                                        @foreach($user->roles as $role)
                                                            <option selected>{{$role->name}}</option>
                                                        @endforeach

                                                        @forelse($roles as $role)
                                                            <option value="{{$role->name}}">{{$role->name}}</option>
                                                        @empty
                                                            <option value="">No roles available</option>
                                                        @endforelse
                                                    </select>
                                                    @error('roles')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="card-footer bg-white">
                                                <button type="submit" class="btn btn-success">Add Role</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-auto">
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-header">
                                            <h5>Manage Permissions</h5>
                                        </div>
                                        <form action="{{route('admin.users.add-permissions',$user)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <select class="form-control w-100" multiple aria-label="multiple select" name="permissions[]">
                                                        @foreach($user->permissions as $permission)
                                                            <option selected>{{$permission->name}}</option>
                                                        @endforeach

                                                        @forelse($permissions as $permission)
                                                            <option value="{{$permission->name}}">{{$permission->name}}</option>
                                                        @empty
                                                            <option value="">No permissions available</option>
                                                        @endforelse
                                                    </select>
                                                    @error('permissions')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="card-footer bg-white">
                                                <button type="submit" class="btn btn-success">Give Permission</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                            </div>

                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->

            </div>
        </div>

    @endsection
