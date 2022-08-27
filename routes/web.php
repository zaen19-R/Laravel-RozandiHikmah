<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

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
    return view('home', [
        "titles" => "Home",
    ]);
});
Route::get('/about', function () {
    return view(
        'about',
        [
            "titles" => "About",
            "name" => "Rozandi Hikmah",
            "email" => "sangpnikmat@gmail.com",
            "image" => "x.jpg",
            "work" => "Backend Dev",
        ]
    );
});
Route::get('/post', [PostController::class, 'index']);

Route::get('/post/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'titles' => 'Categories',
        'categories' => Category::all(),
    ]);
});
Route::get('/categories/{category:slug}', function (Category $category) {
    // ddd($category->);

    return view('category', [
        'title' => $category->name,
        'titles' => 'Category',
        'posts' => $category->posts()->latest()->get(),
        'category' => $category->name,
    ]);
});

Route::get('/user/{user:username}', function (User $user) {
    return view('Post', [
        'title' => $user->name,
        'titles' => 'Author',
        'Posts' => $user->posts->load('category', 'user'),

    ]);
});

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/dashboard', function () {

    $post = Post::where('user_id', auth()->user()->id)->latest()->get();

    return view('dashboard.index', [
        'Posts' => $post,
    ]);
})->middleware(('auth'));

Route::get('/dashboard/about', function () {

    $users = User::where('id', auth()->user()->id)->get();
    $post = Post::where('user_id', auth()->user()->id)->get();
    return view('dashboard.about.index', [
        'Posts' => $post,
        'Users' => $users,
    ]);
})->middleware(('auth'));

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
Route::get('/dashboard/posts/export', [DashboardPostController::class, 'PostExport']);

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
