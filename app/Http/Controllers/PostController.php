<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Post::all();
        $posts = Post::all();
        return Inertia::render('Feed', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        Post::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'likes' => 0,
            'views' => 0,
            'image_url' => 'https://picsum.photos/200/300'
        ]);

        return redirect()->route('my-posts');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::with('user')->find($id);
        return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        // $post = Post::find($post->id);
        // return Inertia::render('EditPost', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('my-posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
