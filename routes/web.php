<?php

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

Route::get('/', 'IndexController@index')->name('index');

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::prefix('user')->group(function(){
        Route::get('profile', 'HomeController@profile')->name('profile');
        Route::get('edit', 'HomeController@edit')->name('user.edit');
        Route::put('update', 'HomeController@update')->name('user.update');
    });
});

Route::resource('course', 'CourseController');
Route::get('course_list/{category}','CategoryController@courseList')->name('course.list');