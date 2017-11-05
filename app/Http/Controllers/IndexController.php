<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index(){
        $courses = Course::orderBy('created_at', 'desc')->take(4)->get();

        return view('index', ['courses' => $courses]);
    }
}
