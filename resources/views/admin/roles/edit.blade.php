@extends('admin.layouts.main')
@section('content')
    <div class="content py-5 px-3">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create Roles</h3>

                    </div>
                    <!-- /.card-header -->
                    <form action="{{route('admin.roles.update',$role)}}" method="POST" class="admin-role-create">
                        @csrf
                        @method('PUT')
                    <div class="card-body">

                            <div class="form-group">
                                <label for="name" class="form-label mb-2">
                                    Role name
                                </label>
                                <input type="text" name="name" id="name" class="form-control w-100 @error('name') is-invalid @enderror" value="{{$role->name}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <button type="submit" class="btn btn-success">Update Role</button>
                    </div>
                    </form>
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col -->

        </div>
    </div>

@endsection
