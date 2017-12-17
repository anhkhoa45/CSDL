<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseCategory;
use App\Http\Requests\ChangeUserPassword;
use App\Http\Requests\UpdateUser;
use App\Http\Requests\UpdateUserAvatar;
use App\Http\Requests\UpdateUserBalance;
use App\RequiredProject;
use App\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Mockery\Exception;
use phpDocumentor\Reflection\Project;

class TeachingController extends Controller
{
    public function getCreateCoursePage()
    {
        $courseCategories = CourseCategory::all();
        return view('user.teaching.create_course', ['courseCategories' => $courseCategories]);
    }

    public function createCourse(Request $request)
    {
        $avatarURL = 'public/courses/avatars/default.png';
        $coverURL = 'public/courses/covers/default.png';

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)
                ->save(public_path('storage/courses/avatars/') . $filename);
            $avatarURL = 'public/courses/avatars/' . $filename;
        }

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $filename = time() . '.' . $cover->getClientOriginalExtension();
            Image::make($cover)->resize(870, 350)
                ->save(public_path('storage/courses/covers/') . $filename);
            $coverURL = 'public/courses/covers/' . $filename;
        }

        DB::beginTransaction();
        try{
            $course = Course::create([
                'name' => $request->name,
                'course_category_id' => (int) $request->category_id,
                'cost' => $request->cost,
                'description' => $request->course_description,
                'avatar' => $avatarURL,
                'cover' => $coverURL,
                'status' => Course::STATUS_PENDING,
                'teacher_id' => auth()->user()->id,
            ]);

            $content_types = $request->content_type;
            $titles = $request->title;
            $urls = $request->url;
            $descriptions = $request->description;
            $contentCount = count($titles);

            for ($i = 0; $i < $contentCount; $i++) {
                switch ($content_types[$i]) {
                    case Course::CTYPE_VIDEO_URL:
                        Video::create([
                            'name' => $titles[$i],
                            'description' => $descriptions[$i],
                            'url' => $urls[$i],
                            'course_id' => $course->id,
                            'order_in_course' => $i + 1,
                            'type' => $content_types[$i]
                        ]);
                        break;
                    case Course::CTYPE_VIDEO_FILE:
                        break;
                    case Course::CTYPE_PROJECT:
                        RequiredProject::create([
                            'name' => $titles[$i],
                            'description' => $descriptions[$i],
                            'url' => $urls[$i],
                            'order_in_course' => $i + 1,
                            'course_id' => $course->id,
                        ]);
                        break;
                    default:
                        throw new Exception('Server internal error');
                }
            }
            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
            return redirect()->route('user.create_course')
                ->withErrors(['create_failed', 'Project create failed']);
        }

        return view('user.teaching.course_created_message');
    }

    public function teachingCourseDetail($course_id)
    {
        $user = auth()->user();
        $course = $user->teachingCourses()->findOrFail($course_id);
        $monthlyBuyers = $course->getMonthlyBuyers();

        $data = [
            'course' => $course,
            'monthlyBuyers' => $monthlyBuyers
        ];

        return view('user.teaching.teaching_course_detail', $data);
    }

    public function getUpdateCourseInfo($course_id){
        $course = Course::findOrFail($course_id);
        $courseCategories = CourseCategory::all();

        $data = [
            'course' => $course,
            'courseCategories' => $courseCategories
        ];
        return view('user.teaching.update_course_info', $data);
    }
}
