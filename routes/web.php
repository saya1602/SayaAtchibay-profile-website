<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\Post;

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
    return view('main');
}) -> name('main');

Route::get('/services', function () {
    return view('services');
}) -> name('sevices');

Route::get('/contacts', function () {
    return view('contacts');
}) -> name('contacts');

Route::get('/post/create', function() {
    DB::table('posts')->insert([
        'id' => 1,
        'title' => 'Lab 4',
        'body' => 'This is my first post.'
    ]); 
});

Route::get('/post', function() {
    $postTitle = Post::find(1)->title;
    $postBody = Post::find(1)->body;
    return $postTitle." <br>".$postBody;
});


