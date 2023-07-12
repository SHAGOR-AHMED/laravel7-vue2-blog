<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('site.layout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/{anypath}', 'HomeController@index')->where('path','.*');
Route::post('/add-category', 'Admin\CategoryController@store')->name('add-category');
Route::get('/get-categories', 'Admin\CategoryController@index');
Route::get('/remove-category/{id}', 'Admin\CategoryController@destroy');
Route::get('/show-category/{id}', 'Admin\CategoryController@show');
Route::post('/update-category', 'Admin\CategoryController@update');

// Post
Route::get('/get-posts', 'Admin\PostController@index');
Route::get('/getpaginationPosts', 'Admin\PostController@getpaginationPosts');
Route::post('/add-post', 'Admin\PostController@store');
Route::get('/remove-post/{id}', 'Admin\PostController@destroy');
Route::get('/show-post/{id}', 'Admin\PostController@show');
Route::post('/update-post', 'Admin\PostController@update');

//public 
Route::get('/get-active-top-category', 'Admin\CategoryController@index');
Route::get('/get-show-post/{id}', 'Admin\PostController@show');
Route::get('/get-postByCategory/{id}', 'Admin\PostController@getPostByCategory');