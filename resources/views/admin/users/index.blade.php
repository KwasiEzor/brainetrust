@extends('admin.layouts.main')
@section('content')
    <div class="content py-5 px-3">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Users</h3>
                        <a href="{{route('admin.users.create')}}" class="btn btn-primary float-right">
                            <i class="fas fa-plus-square mr-1"></i>
                            New User
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th style="width: auto">Created At</th>
                                <th style="width: auto" class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>
                                   {{$user->email}}
                                </td>
                                <td>
                                    @foreach($user->roles as $role)
                                        {{$role->name}}
                                    @endforeach
                                </td>
                                <td>
                                    {{$user->created_at->format('Y-m-d')}}
                                </td>
                                <td class="d-flex align-items-center justify-content-center " style="gap:5px;">
                                    <a href="{{route('admin.users.show',$user)}}" class="btn btn-success ">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{route('admin.users.edit',$user)}}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td>No data available</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <div class="col-6 mx-auto d-flex justify-content-end">
                            {{$users->links()}}
                        </div>
                    </div>
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col -->

        </div>
    </div>

@endsection
