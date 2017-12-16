<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\UpdateCourseRating;
use App\Video;

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

    public function watchVideo($course_id, $video_id){
        $course = Course::findOrFail($course_id);
        $video = $course->videos()->findOrFail($video_id);
        $prev = $course->videos()->where('course_id', $course_id)->where('order_in_course', $video->order_in_course - 1)->first();
        $next = $course->videos()->where('course_id', $course_id)->where('order_in_course', $video->order_in_course + 1)->first();

        $data = [
            'course' => $course,
            'video' => $video,
            'prev' => $prev,
            'next' => $next
        ];

        return view('user.learning-zone.watch_video', $data);
    }

    public function earnVideoScore($course_id, $video_id){
        $user = auth()->user();
        $course = Course::findOrFail($course_id);
        $video = $course->videos()->findOrFail($video_id);

        $user->update([
           'leaning_score' =>  $user->learning_score + $video->score
        ]);
    }

    /**
     * @param $course_id
     * @param $user_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

}
