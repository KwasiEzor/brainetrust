<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::withCount('likes')
            ->with(['category','comments','likes','user','tags'])
            ->latest()
            ->paginate();

        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePostRequest $request)
    {
        //
        $imageName = null;
        //dd($request->all());
        try {
           $post = Post::create($request->validated());
            if($request->hasFile('cover_img')){
                $file = $request->file('cover_img');
                $extension = $file->extension();
                $post->update([
                    'cover_img'=>$file->storeAs('images/posts/'.$post->id,time().'-post-'.$post->id.'.'.$extension)
                ]);
            }
            if($request->has('tags'))
            {
                $tags = $request->input('tags');
                $post->tags()->sync($tags);
            }

            return redirect()->route('admin.posts.index')->with('success','Post created successfully');
        }catch (\Exception $exception)
        {
            return  redirect()->back()->with('error',$exception);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
     * @return View
     */
    public function show(Post $post): View
    {
        //dd($post);
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
