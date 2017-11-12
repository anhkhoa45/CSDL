<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){

        $recently_courses = Course::orderBy('created_at', 'desc')->take(4)->get();
        $popular_courses = Course::find(
            DB::table('buy_courses')
                ->select('course_id')
                ->groupBy('course_id')
                ->orderBy(DB::raw('count("course_id")'))
                ->pluck('course_id')->all()
        )->take(4)->all();

        return view('index', ['r_courses' => $recently_courses, 'p_courses' => $popular_courses]);
    }
}
