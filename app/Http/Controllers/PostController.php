<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Prompt;
use App\Models\Tag;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Post::all();
        $posts = Post::with("user")->latest()->get();
        $prompt = Prompt::latest()->first()->content;
        return Inertia::render('Feed', ['posts' => $posts, 'prompt' => $prompt, 'user' => auth()->user()]);
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

        // dd($request);
        $image_url = '/images/articlePost.png';

        if ($request->hasFile('image_url')) {
            $image_url = "/storage/" . $request->file('image_url')->store('image', 'public');
        }

        Post::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'content' => $request->content,
            'likes' => 0,
            'views' => 0,
            'image_url' => $image_url,
        ]);

        $tags = explode(',', $request->tags);

        if ($tags[0] == "") {
            $tags = [];
        } else {
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
                $tag->save();
            }
        }

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

        // $title = $request->attributes->get('title') || $post->title;
        // $content = $request->attributes->get('content') || $post->content;
        // $image_url = $request->attributes->get('image_url') || $post->image_url || '/images/articlePost.png';

        $image_url = $post->image_url;

        // if ($request->hasFile('image_url')) {

        //     if (strpos($request->image_url, "storage")) {
        //         // echo "Substring found!";
        //     } else {
        //         // echo "Substring not found!";
        //         $image_url = "/storage/" . $request->file('image_url')->store('image', 'public');
        //     }
        // }

        // dd($request->input("title"));

        // $title = $request->input('title');
        // $content = $request->input('content');
        // $imageUrl = $request->input('image_url');

        // dd($title, $content, $imageUrl);

        // dd($request, $post, $title, $content, $imageUrl);

        // $tagString = $request->tags;

        // Split the string into individual tags


        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'image_url' => $image_url,
        ]);

        $tags = explode(',', $request->tags);

        if ($tags[0] == "") {
            $tags = [];
        } else {
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => trim($tagName)]);

                // Attach the tag to the post
                $post->tags()->syncWithoutDetaching($tag);
            }
        }



        return redirect()->route('my-posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->user_id != auth()->user()->id) {
            return Redirect::intended('/my-posts');
        }

        $post->comments()->delete();

        Post::destroy($post->id);
        return redirect()->route('my-posts')->with('message', 'Post deleted successfully');;
    }

    // public function like(Post $post)
    // {
    //     $post->update([
    //         'likes' => $post->likes + 1
    //     ]);

    //     return redirect()->back();
    // }
}
