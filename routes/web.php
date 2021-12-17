<?php

//use App\Http\Controllers\RestTestController;

use App\Http\Controllers\Blog\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

//  Route::get('/test', [RestTestController::class, 'index'])->name('id');
//Route::get('/test', 'App\Http\Controllers\RestTestController@index')->name('id');
Route::resource('rest', 'App\Http\Controllers\RestTestController');

// Route::get('/post/all',[PostController::class, 'index']);
Route::group(
    ['namespace' => 'App\Http\Controllers\Blog', 'prefix' => 'blog'],
    function(){

        Route::resource('posts', 'PostController')->names('blog.posts');
    }
);


