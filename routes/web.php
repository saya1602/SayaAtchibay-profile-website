<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\Post;
use App\Models\Customer;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CustomerController;

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

Route::redirect('/', '/en');

Route::group(['prefix'=>'{language}'], function () {
    Route::get('/', function () {
        return view('main');
    }) -> name('main');
    
    Route::get('/services', function () {
        return view('services');
    }) -> name('sevices');
    
    Route::get('/contacts', function () {
        return view('contacts');
    }) -> name('contacts');
    
    
    Route::get('/post/add', function() {
        DB::table('posts')->insert([
            'id' => 1,
            'title' => 'Lab 4',
            'body' => 'This is my second post.'
        ]); 
    });
    
    Route::get('/post', [BlogController::class, 'index']);
    Route::get('/post/create', function() {
        return view('blog.create');
    });
    Route::post('post/create', [BlogController::class, 'store'])->name('add-blog');
    
    Route::get('post/{id}', [BlogController::class, 'get_post']);
    
    Route::get('/sendemail', [CustomerController::class, 'index']);
    Route::post('/sendemail', [CustomerController::class, 'store'])->name('add-customer');
    
    Route::get('/customers/display', [CustomerController::class, 'display']);
    Route::get('/{lang}', function($lang) {
        App::setlocale($lang);
        // echo $lang;
        return view('main');
    });


});
