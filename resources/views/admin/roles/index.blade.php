@extends('admin.layouts.main')
@section('content')
    <div class="content py-5 px-3">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title">Roles</h3>
                        <a href="{{route('admin.roles.create')}}" class="btn btn-primary float-right">
                            <i class="fas fa-plus-square mr-1"></i>
                            New Role
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Name</th>
                                <th style="width: auto">Created At</th>
                                <th style="width: auto" class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>

                                    <td>
                                        {{$role->created_at}}
                                    </td>
                                    <td class="d-flex align-items-center justify-content-center">
                                        <a href="{{route('admin.roles.edit',$role)}}" class="btn btn-success mr-2">
                                            Edit
                                        </a>
                                        <form action="{{route('admin.roles.delete',$role)}}"  id="admin-delete-role" method="POST">
                                            @csrf()
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit" onclick="confirm('Are you sure ?'); document.getElementById('admin-delete-role').submit()">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>

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
                            {{$roles->links()}}
                        </div>
                    </div>
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col -->

        </div>
    </div>

@endsection
