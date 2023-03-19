@extends('admin.layouts.main')
@section('content')
    <div class="content py-5 px-3">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card relative">
                    <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1172&q=80" alt="{{$post->title}}" class="card-img-top img-fluid"  />
                    <div class="card-body">
                        <h5>{{$post->title}}</h5>
                        <div class="d-flex align-items-center justify-content-between rounded">
                            <p>Author : <span class="text-primary">{{$post->user->name}}</span></p>
                            <p class="text-muted text-ms bg-light px-3 py-2">{{$post->getFormatedCreatedAt()}}</p>
                        </div>
                        <p class="card-text text-muted">
                            {{$post->content}}
                        </p>
                    </div>

                </div>
                <!-- /.card -->


            </div>
            <!-- /.col -->

        </div>
    </div>

@endsection

