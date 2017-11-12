<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){

        $recently_courses = Course::with('teacher')->orderBy('created_at', 'desc')->take(4)->get();
        $popular_courses = Course::with('teacher')->find(

            DB::table('buy_courses')
                ->select('course_id')
                ->groupBy('course_id')
                ->orderBy(DB::raw('count("course_id")'))
                ->pluck('course_id')->all()
        )->take(4)->all();

        return view('index', ['r_courses' => $recently_courses, 'p_courses' => $popular_courses]);
    }

    public function showTeacherInfo($id){
        $teacher = User::with('teaching_courses')->findOrFail($id);
        return view('teacher-info', ['teacher' => $teacher]);
    }

    public function showCourseInfo($id){
        $course =  Course::findOrFail($id);
        return view('courses-details', ['course' => $course]);
    }
}
