@extends('admin.layouts.main')
@section('content')
    <div class="content py-5 px-3">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Permissions</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Name</th>
                                <th style="width: auto">Created At</th>
                                <th style="width: auto">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($permissions as $permission)
                                <tr>
                                    <td>{{$permission->id}}</td>
                                    <td>{{$permission->name}}</td>

                                    <td>
                                        {{$permission->created_at}}
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-success">
                                            Edit
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
                            {{$permissions->links()}}
                        </div>
                    </div>
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col -->

        </div>
    </div>

@endsection
