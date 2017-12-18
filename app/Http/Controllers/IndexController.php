<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseCategory;
use App\User;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        if(auth()->check()) {
            $enrolledCourses = auth()->user()->enrolledCourses->pluck('id');
        }
        else {
            $enrolledCourses = [];
        }
        $courses = DB::table('courses')
            ->where('courses.status', '=', Course::STATUS_ACTIVE)
            ->whereNotIn('courses.id', $enrolledCourses)
            ->leftJoin('users as teacher', 'teacher_id', '=', 'teacher.id')
            ->leftJoin('buy_courses', 'courses.id', '=', 'course_id')
            ->leftJoin('users as buyers', 'buyer_id', '=', 'buyers.id')
            ->groupBy(['courses.id', 'teacher.name', 'teacher.avatar'])
            ->select([
                'courses.*',
                'teacher.name as teacher_name',
                'teacher.avatar as teacher_avatar',
                DB::raw('count(buyers.id) as buyers'),
                DB::raw('avg(CASE WHEN buy_courses.rating != 0 THEN buy_courses.rating ELSE NULL END) as avg_rating'),
            ])->get();

        $recently_courses = $courses->sortByDesc('created_at')->take(4);
        $popular_courses = $courses->sortByDesc('buyers')->take(4);
        $toprating_courses = $courses->sortByDesc('avg_rating')->take(4);

        $data = [
            'r_courses' => $recently_courses,
            'p_courses' => $popular_courses,
            't_courses' => $toprating_courses
        ];

        return view('index', $data);
    }

    public function showTeacherInfo($id){
        $teacher = User::with(['teachingCourses'])->findOrFail($id);
        return view('teacher-info', ['teacher' => $teacher]);
    }

    public function showCourseInfo($id){
        $course =  Course::with(['videos', 'projects'])->where('courses.id', $id)
            ->leftJoin('users as teacher', 'teacher_id', '=', 'teacher.id')
            ->leftJoin('buy_courses', 'courses.id', '=', 'course_id')
            ->leftJoin('users as buyers', 'buyer_id', '=', 'buyers.id')
            ->groupBy(['courses.id', 'teacher.name', 'teacher.avatar', 'teacher.description'])
            ->select([
                'courses.*',
                'teacher.name as teacher_name',
                'teacher.avatar as teacher_avatar',
                'teacher.description as teacher_description',
                DB::raw('count(buyers.id) as buyers'),
                DB::raw('avg(buy_courses.rating) as avg_rating'),
            ])->first();

        $courseContents = $course->videos->merge($course->projects)->sortBy('order_in_course');

        return view('courses-details', ['course' => $course, 'courseContents' => $courseContents]);
    }

    public function showCategoryCourse($category_id)
    {
        $category = CourseCategory::findOrFail($category_id);
        $courses = $category->courses()->whereNotIn('id', auth()->user()->enrolledCourses->pluck('id')->toArray())
            ->whereNotIn('id', auth()->user()->teachingCourses->pluck('id')->toArray())
            ->with(['teacher', 'buyers'])
            ->paginate(config('view.paginate'));

        $data = [
            'category' => $category,
            'courses' => $courses
        ];

        return view('page-courses-category', $data);
    }

    public function  showAllCourse()
    {
        $courses = Course::whereNotIn('id', auth()->user()->enrolledCourses->pluck('id')->toArray())
            ->whereNotIn('id', auth()->user()->teachingCourses->pluck('id')->toArray())
            ->with(['teacher', 'buyers'])
            ->paginate(config('view.paginate'));

        return view('page-all-courses',['courses'=>$courses]);
    }

}
