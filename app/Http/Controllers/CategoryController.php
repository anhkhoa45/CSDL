<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function courseList($category)
   {
       $courses = Course::where('category_id', '=', $category)->get()->all();
       return view('course_list', ['courses' => $courses]);
   }
}
