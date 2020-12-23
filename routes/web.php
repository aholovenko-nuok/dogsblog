<?php

use Illuminate\Support\Facades\Route;

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
Route::post('/replies/store', [App\Http\Controllers\ReplyController::class, 'store']);
Route::post('/replies/replysaver', [App\Http\Controllers\ReplyController::class, 'replysaver']);
Route::post('/comments/store', [App\Http\Controllers\CommentController::class, 'store']);

// Route::resource('/comments', App\Http\Controllers\CommentController::class);
Route::get('/', function () {
    return view('frontpage.blog');
});

Auth::routes();

Route::resource('/admin/articles', App\Http\Controllers\Admin\ArticleController::class);

Route::resource('', App\Http\Controllers\ArticleController::class);

Route::post('/search', [App\Http\Controllers\ArticleController::class, 'search']);
Route::get('/search', [App\Http\Controllers\ArticleController::class, 'search']);
Route::get('/articles/{id}', [App\Http\Controllers\ArticleController::class, 'show']);

Route::get('/authors', [App\Http\Controllers\ArticleController::class, 'authors']);

Route::resource('/categories', App\Http\Controllers\CategoryController::class);

Route::resource('/admin/categories', App\Http\Controllers\Admin\CategoryController::class);


Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout' );

