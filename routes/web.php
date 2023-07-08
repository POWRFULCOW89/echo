<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\UserList;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'posts' => Post::with('user')->with("tags")->latest()->take(10)->get(),
        'user' => auth()->user(),
    ]);
});

Route::get("/mission", function () {
    return Inertia::render("Mission", [
        "user" => auth()->user(),
    ]);
});

Route::get("/membership", function () {
    return Inertia::render("Membership", [
        "user" => auth()->user(),
    ]);
});


Route::get('/posts/{post}', function (Post $post) {

    $post->views += 1;
    $post->save();

    $post->tags = $post->tags()->get();

    return Inertia::render('Post', [
        'post' => $post,
        // 'tags' => Tag::all(),
        'user' => $post->user,
        'posts' => Post::with('user')->with("tags")->latest()->take(10)->get(),
        "currentUser" => auth()->user(),
        'comments' => $post->comments()->with('user')->get(),
    ]);
})->name('posts.show');

Route::get('/profile/{user}', function (User $user) {
    return Inertia::render('PublicProfile', [
        'user' => $user,
        'posts' => Post::with('user')->with("tags")->where("user_id", $user->id)->take(10)->get(),
        "currentUser" => auth()->user(),
    ]);
})->name('profile');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard', [
            'user' => auth()->user(),
        ]);
    })->name('dashboard');

    Route::get('/feed', [PostController::class, 'index'])->name('posts.index');

    Route::get("/my-posts", function () {
        $user = auth()->user();

        // check how many posts has a user made in the last month
        $posts = Post::where("user_id", $user->id)->where("created_at", ">", now()->subMonth())->get();

        $canCreatePosts = $user->member || $posts->count() < 3;

        // if (!$canCreatePosts) {
        //     return Redirect::intended('/my-posts')->with("canCreatePosts", false);
        // }

        return Inertia::render("MyPosts", [
            "posts" => Post::where("user_id", $user->id)->latest()->get(),
            "user" => $user,
            "canCreatePosts" => $canCreatePosts
        ]);
    })->name("my-posts");

    Route::get("/editor/{id}", function ($id) {
        $post = Post::with('tags')->find($id);

        if ($post->user_id != auth()->user()->id) {
            return Redirect::intended('/my-posts');
        }

        return Inertia::render("Editor", [
            "post" => $post,
            'user' => auth()->user(),
        ]);
    })->name('editor.edit');

    Route::get("/editor", function () {
        $user = auth()->user();

        // check how many posts has a user made in the last month
        $posts = Post::where("user_id", $user->id)->where("created_at", ">", now()->subMonth())->get();

        $canCreatePosts = $user->member || $posts->count() < 3;

        if (!$canCreatePosts) {
            return Redirect::intended('/my-posts')->with("canCreatePosts", false);
        }

        return Inertia::render("Editor", [
            "post" => null,
            'user' => auth()->user(),
        ]);
    })->name('editor');


    Route::put("/editor/:id", function ($id) {
        $post = Post::find($id);
        $post->title = request()->title;
        $post->content = request()->content;
        $post->save();

        return redirect()->route("my-posts");
    })->name('editor');


    Route::post('/posts', [PostController::class, 'store'])->name('save-post');

    Route::put('/posts/{post}', [PostController::class, 'update'])->name('update-post');

    Route::get("/search-post", function () {
        $user = auth()->user();
        $query = request()->query('q');

        return Inertia::render("SearchPost", [
            // 'posts' => Post::with('user')->with("tags")->latest()->take(10)->get(),
            'posts' => Post::with('user')->with("tags")->where("title", "LIKE", "%$query%")->orWhere("content", "LIKE", "%$query%")->get(),
            'user' => $user,
        ]);
    })->name("search-post");

    Route::get("/search-people", function () {
        $user = auth()->user();
        $query = request()->query('q');

        return Inertia::render("SearchPeople", [
            // 'posts' => Post::with('user')->with("tags")->latest()->take(10)->get(),
            'user' => $user,
            'users' => User::where("name", "LIKE", "%$query%")->orWhere("email", "LIKE", "%$query%")->get(),
        ]);
    })->name("search-people");

    Route::get("/search-tags", function () {
        $user = auth()->user();
        return Inertia::render("SearchTags", [
            'posts' => Post::with('user')->with("tags")->latest()->take(10)->get(),
            'tags' => Tag::where("name", "LIKE", "%" . request()->query('q') . "%")->get(),
            'user' => $user,
        ]);
    })->name("search-tags");

    Route::get("/search-lists", function () {
        $user = auth()->user();
        $query = request()->query('q');
        return Inertia::render("SearchLists", [
            // 'posts' => Post::with('user')->with("tags")->latest()->take(10)->get(),
            // User::where("name", "LIKE", "%$query%")->orWhere("email", "LIKE", "%$query%")->get(),
            'lists' => UserList::where("name", "LIKE", "%" . $query . "%")->orWhere("description", "LIKE", "%$query%")->get(),
            'user' => $user,
        ]);
    })->name("search-lists");

    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('delete-post');

    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('store-comment');
});
