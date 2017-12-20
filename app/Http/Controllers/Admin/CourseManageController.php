<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CourseManageController extends Controller
{
    //
    public function guard()
    {
        return Auth::guard('admin');
    }

    public function courses()
    {
        $courses=DB::select("SELECT courses.*,course_categories.name as category,users.name as teacher 
                                    FROM courses,course_categories,users
                                    WHERE courses.course_category_id=course_categories.id
                                       AND courses.teacher_id=users.id");
        return view('admin.courses.home',['courses'=>$courses]);
    }
    public function courseShow($id)
    {
        $courses=DB::select("SELECT courses.*,course_categories.name as category,users.name as teacher 
                                    FROM courses,course_categories,users
                                    WHERE courses.course_category_id=course_categories.id
                                       AND courses.teacher_id=users.id
                                       AND courses.id=$id");
    return view('admin.courses.show',['course'=>$courses]);
    }
}
