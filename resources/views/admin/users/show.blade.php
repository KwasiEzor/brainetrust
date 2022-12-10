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
                                                <span class="badge bg-success py-1 px-2">{{ucwords($permission->name)}}</span>
                                            @empty
                                                <span class="text-muted">Not available</span>
                                            @endforelse

                                        </p>
                                    </div>
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
