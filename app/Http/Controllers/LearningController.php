<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCourseRating;

class LearningController extends Controller
{
    public function learnCourse($course_id)
    {
        $user = auth()->user();

        $course =  $user->enrolledCourses()->with('teacher')->findOrFail($course_id);

        return view('user.learning-zone.course_overview', ['course' => $course]);
    }

    public function rateCourse($course_id, UpdateCourseRating $request){
        $rating = $request->rating;

        auth()->user()->enrolledCourses()->updateExistingPivot($course_id, ['rating' => $rating]);

        return redirect()->route('user.learn_course', ['course' => $course_id]);
    }
}
