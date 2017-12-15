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
Route::get('/home',function()
{
   return "Hello";
});

Route::middleware(['auth'])->group(function(){
    Route::prefix('user')->group(function(){
        Route::get('profile', 'HomeController@profile')->name('profile');
        Route::put('update-info', 'HomeController@updateInfo')->name('user.update_info');
        Route::put('update-ava', 'HomeController@updateAvatar')->name('user.update_ava');
        Route::put('change-password', 'HomeController@changePassword')->name('user.change_password');
        Route::get('enroll-course/{course}', 'HomeController@enrollCourse')->name('enroll-course');
        Route::get('create-course', 'HomeController@getCreateCoursePage')->name('user.get_create_course');
        Route::post('create-course', 'HomeController@createCourse')->name('user.create_course');
        Route::get('enrolled-courses', 'HomeController@enrolledCourses')->name('user.enrolled_courses');

        Route::middleware(['enrolled'])->group(function() {
            Route::get('learn-course/{course}', 'HomeController@learnCourse')->name('user.learn_course');
        });
    });
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function (){
    Route::group(['middleware'=>'guest'],function()
    {
        Route::get('login', 'AdminController@showLogin')->name('admin.show_login');
        Route::post('login','AdminController@login')->name('admin.get_login');
      //  Route::get('login2','AdminController@login2')->name('admin.show_login2');
        //Route::post('login2','AdminController@login2')->name('admmin.get_login2');
    });
    Route::group(['middleware'=>'admin_auth'],function(){
        Route::get('home','AdminController@home')->name('admin.home');
        Route::get('profile','AdminController@profile')->name('admin.profile');
        Route::put('update-info','AdminController@updateInfo')->name('admin.update_info');
        Route::put('update-ava','AdminController@updateAvatar')->name('admin.update_ava');
        Route::put('change-password','AdminController@changePassword')->name('admin.change_password');
        Route::get('cateloges','AdminController@cateloges')->name('admin.cataloges');
        Route::get('users','AdminController@users')->name('admin.users');
        Route::get('create-admin','AdminController@createAdmin')->name('admin.create_admin');
        Route::get('courses','AdminController@courses')->name('admin.courses');
    });
});

Route::get('course-info/{id}', 'IndexController@showCourseInfo')->name('course-info');
Route::get('teacherinfo/{id}', 'IndexController@showTeacherInfo')->name('teacher-info');