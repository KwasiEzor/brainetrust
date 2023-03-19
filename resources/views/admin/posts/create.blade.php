@extends('admin.layouts.main')
@section('content')
    <div class="content py-5 px-3">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create posts</h3>

                    </div>
                    <!--Post session message -->
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show mx-auto" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <!--Post session message end -->
                    <!-- /.card-header -->
                    <form action="{{route('admin.posts.store')}}" method="POST" class="admin-post-create" enctype="multipart/form-data" >
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name" class="form-label mb-2">
                                    Title
                                </label>
                                <input type="text" name="title" id="title" value="{{old('title')}}" class="form-control w-100 @error('title') is-invalid @enderror">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-label mb-2">
                                     Subtitle
                                </label>
                                <input type="text" name="subtitle" id="subtitle" value="{{old('subtitle')}}" class="form-control w-100 @error('subtitle') is-invalid @enderror">
                                @error('subtitle')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="source" class="form-label mb-2">
                                    Source
                                </label>
                                <input type="text" name="source" id="source" value="{{old('source')}}" class="form-control w-100 @error('source') is-invalid @enderror">
                                @error('source')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="categories" class="form-label mb-2">Categories</label>
                                <select class="form-control" id="categories" aria-label="Categories" name="category_id">
                                    <option selected>Select category menu</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="users" class="form-label mb-2">Authors</label>
                                <select class="form-control" id="users" aria-label="Categories" name="user_id">
                                    <option selected>Select Post author</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tags" class="form-label mb-2">Tags</label>
                                <select class="form-control" id="tags" aria-label="Tags" name="tags[]" multiple>
                                    <option selected>Select Post Tags</option>
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                </select>
                                @error('tags')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="formFile" class="form-label">Cover Image</label>
                                <input class="form-control" accept="jpg,jpeg,png" type="file" max="1025" id="formFile" name="cover_img" >
                                @error('cover_img')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Post content..." name="content" id="content" style="height: 300px">
                                        {{old('content')}}
                                    </textarea>

                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-check">
                                <input class="" type="checkbox" name="is_published" id="is_published" value="1" {{old('is_published') == 1 ? 'checked' : '' }}>
                                <label for="is_published">
                                    Published
                                </label>

                            </div>
                            <div class="form-check">
                                <input class="" type="checkbox" name="is_highlighted" id="is_highlighted" value="1" {{old('is_highlighted') == 1 ? 'checked' : '' }}>
                                <label for="is_highlighted">
                                    Highlighted
                                </label>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-success">Add post</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col -->

        </div>
    </div>

@endsection

