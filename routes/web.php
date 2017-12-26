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
        Route::put('update-info', 'HomeController@updateInfo')->name('user.update_info');
        Route::put('update-ava', 'HomeController@updateAvatar')->name('user.update_ava');
        Route::put('update-balance', 'HomeController@updateBalance')->name('user.update_balance');
        Route::put('change-password', 'HomeController@changePassword')->name('user.change_password');
        Route::get('enroll-course/{course}', 'HomeController@enrollCourse')->name('enroll-course');
        Route::get('enrolled-courses', 'HomeController@enrolledCourses')->name('user.enrolled_courses');

        Route::get('create-course', 'TeachingController@getCreateCoursePage')->name('user.get_create_course');
        Route::post('create-course', 'TeachingController@createCourse')->name('user.create_course');
        Route::get('update-course-info/{course}', 'TeachingController@getUpdateCourseInfo')
            ->name('user.get_update_course_info');
        Route::put('update-course-info/{course}', 'TeachingController@postUpdateCourseInfo')
            ->name('user.post_update_course_info');
        Route::get('teaching-course/{course}', 'TeachingController@teachingCourseDetail')
            ->name('user.teaching_course_detail');

        Route::middleware(['enrolled'])->group(function() {
            Route::get('learn-course/{course}', 'LearningController@learnCourse')->name('user.learn_course');
            Route::post('rate-course/{course}', 'LearningController@rateCourse')->name('user.rate_course');
            Route::get('{course}/watch-video/{video}', 'LearningController@watchVideo')->name('user.watch_video');
            Route::get('{course}/earn-video-score/{video}', 'LearningController@earnVideoScore')
                ->name('user.earn_video_score');
        });
    });
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function (){
    Route::group(['middleware'=>'guest'],function()
    {
        Route::get('login', 'AdminController@showLogin')->name('admin.show_login');
        Route::post('login','AdminController@login')->name('admin.get_login');
    });
    Route::group(['middleware'=>'admin_auth'],function(){
        Route::post('logout','AdminController@logout')->name('admin.logout');
        Route::get('home','AdminController@home')->name('admin.home');
        Route::get('profile/{admin}','AdminController@profile')->name('admin.profile');
        Route::put('update-info/{admin}','AdminController@update')->name('admin.update');
        Route::get('edit/{admin}','AdminController@edit')->name('admin.edit');

        Route::get('create-admin','AdminController@createAdmin')->name('admin.create_admin');
        Route::post('store-admin','AdminController@storeAdmin')->name('admin.store_admin');
        //User
        Route::get('users','AdminController@users')->name('admin.users');
        Route::put('users-update/{user}','AdminController@usersUpdate')->name('admin.users.update');
        Route::get('users-create','AdminController@usersCreate')->name('admin.users.create');
        Route::post('users-store','AdminController@usersStore')->name('admin.users.store');
        Route::get('users-edit/{user}','AdminController@usersEdit')->name('admin.users.edit');
        Route::delete('users-destroy/{user}','AdminController@usersDestroy')->name('admin.users.destroy');
        Route::get('users-show/{user}','AdminController@usersShow')->name('admin.users.show');
        Route::get('users-search','AdminController@usersSearch')->name('admin.users.search');
        //Catagories
        Route::get('categories','AdminController@categories')->name('admin.categories');
        Route::get('categories-show/{catagories}','AdminController@categoriesShow')->name('admin.categories.show');
        Route::get('categories-create','AdminController@categoriesCreate')->name('admin.categories.create');
        Route::post('categories-store','AdminController@categoriesStore')->name('admin.categories.store');
        Route::get('categories-edit/{categories}','AdminController@categoriesEdit')->name('admin.categories.edit');
        Route::put('categories-update/{categories}','AdminController@categoriesUpdate')->name('admin.categories.update');
        Route::delete('categories-destroy/{categories}','AdminController@categoriesDestroy')->name('admin.categories.destroy');
        Route::get('categories-search','AdminController@categoriesSearch')->name('admin.categories.search');
        //Course
        Route::get('courses','CourseManageController@courses')->name('admin.courses');
        Route::get('course-show/{course}','CourseManageController@courseShow')->name('admin.courses.show');
        Route::get('course-edit/{course}','CourseManageController@courseEdit')->name('admin.courses.edit');
        Route::put('course-update/{course}','CourseManageController@courseUpdate')->name('admin.courses.update');
        Route::get('course-search','CourseManageController@courseSearch')->name('admin.courses.search');
        //Request
        Route::get('course-request/{course}','CourseManageController@courseRequest')->name('admin.course.request');
    });
});

Route::get('course-info/{id}', 'IndexController@showCourseInfo')->name('course-info');
Route::get('teacherinfo/{id}', 'IndexController@showTeacherInfo')->name('teacher-info');
Route::get('category/{id}','IndexController@showCategoryCourse')->name('category');
Route::get('all-course','IndexController@showAllCourse')->name('all-course');
