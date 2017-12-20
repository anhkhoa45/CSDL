<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\CourseCategory;
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

    public function courseEdit($id)
    {
        $courses=DB::select("SELECT courses.*,course_categories.name as category,users.name as teacher 
                                    FROM courses,course_categories,users
                                    WHERE courses.course_category_id=course_categories.id
                                       AND courses.teacher_id=users.id
                                       AND courses.id=$id");
        $categories=DB::select("SELECT *
                                        FROM course_categories");
return view('admin.courses.edit',['courses'=>$courses,'categories'=>$categories]);
    }

    public function courseUpdate(Request $request,$id)
    {
    $course=Course::findOrFail($id);
    $course->update([
        'status'=>$request['status'],
        'course_category_id'=>$request['category'],
    ]);
    return redirect()->route('admin.courses.show',['course'=>$course]);
    }

    public function courseSearch()
    {
        $course = Course::where('name', 'like', '%'.request()->name.'%')->orderBy('name')->paginate(10);

        return view('admin.courses.search', ['courses' => $course]);
    }
}
