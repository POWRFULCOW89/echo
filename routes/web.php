<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
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
    ]);
});

Route::get("/mission", function () {
    return Inertia::render("Mission");
});

Route::get("/membership", function () {
    return Inertia::render("Membership");
});


Route::get('/posts/{post}', function (Post $post) {
    return Inertia::render('Post', [
        'post' => $post,
        'user' => $post->user,
        'posts' => Post::with('user')->with("tags")->latest()->take(10)->get(),
    ]);
});

Route::get('/profile/{user}', function (User $user) {
    return Inertia::render('PublicProfile', [
        'user' => $user,
        'posts' => Post::with('user')->with("tags")->where("user_id", $user->id)->take(10)->get(),
    ]);
})->name('profile');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');


    Route::get('/feed', [PostController::class, 'index'])->name('posts.index');

    Route::get("/my-posts", function () {
        $user = auth()->user();
        return Inertia::render("MyPosts", [
            "posts" => Post::where("user_id", $user->id)->get(),
        ]);
    })->name("my-posts");

    Route::get("/editor/{id}", function ($id) {
        $post = Post::find($id);

        if ($post->user_id != auth()->user()->id) {
            return Redirect::intended('/my-posts');
        }

        return Inertia::render("Editor", [
            "post" => $post,
        ]);
    })->name('editor.edit');

    Route::get("/editor", function () {
        return Inertia::render("Editor", [
            "post" => null,
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
});
