<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseCategory;
use App\Http\Requests\ChangeUserPassword;
use App\Http\Requests\UpdateUser;
use App\Http\Requests\UpdateUserAvatar;
use App\RequiredProject;
use App\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Mockery\Exception;
use phpDocumentor\Reflection\Project;

class HomeController extends Controller
{
    public function profile()
    {
        return view('user.profile');
    }

    public function updateInfo(UpdateUser $request)
    {
        $request->user()->update($request->all());

        return redirect()->route('profile')
            ->with('success', 'Your profile updated successfully ')
            ->with('page', 'update_info');
    }

    public function updateAvatar(UpdateUserAvatar $request)
    {
        $imagePath = $request->user()->avatar;

        if (isset($request->avatar)) {
            $imagePath = $request->file('avatar')->storeAs(
                'public/users/avatars',
                $request->user()->id
            );
        }

        $request->user()->update([
            'avatar' => $imagePath,
        ]);

        return redirect()->route('profile')
            ->with('success', 'Your profile updated successfully ')
            ->with('page', 'update_avatar');
    }

    public function changePassword(ChangeUserPassword $request)
    {
        $user = auth()->user();

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->route('profile')
                ->withErrors(['old_password' => 'Password does not match']);
        }
        $user->update(['password' => bcrypt($request->password)]);
        return view('profile')
            ->with('success', 'Your profile updated successfully ');
    }

    public function enrollCourse($course_id)
    {
        $user = auth()->user();

        if(DB::table('buy_courses')->where('buyer_id', $user->id)->where('course_id', $course_id)->count()){
            return redirect()->back()->withErrors(['Permission denied']);
        }

        auth()->user()->enrolledCourses()->attach($course_id, ['date_bought' => Carbon::now()]);
        return redirect()->route('user.learn_course', ['id' => $course_id]);
    }

    public function enrolledCourses(){
        $user = auth()->user();

        $enrolledCourses = $user->enrolledCourses()->with('teacher', 'buyers')->paginate(12);

        $data = [
            'courses' => $enrolledCourses
        ];

        return view('user.learning-zone.enrolled_courses', $data);
    }

    public function learnCourse($course_id)
    {
        $course =  Course::where('courses.id', $course_id)
            ->leftJoin('users as teacher', 'teacher_id', '=', 'teacher.id')
            ->leftJoin('buy_courses', 'courses.id', '=', 'course_id')
            ->leftJoin('users as buyers', 'buyer_id', '=', 'buyers.id')
            ->groupBy(['courses.id', 'teacher.name', 'teacher.avatar'])
            ->select([
                'courses.*',
                'teacher.name as teacher_name',
                'teacher.avatar as teacher_avatar',
                DB::raw('count(buyers.id) as buyers')
            ])->first();

        return view('user.learning-zone.course_overview', ['course' => $course]);
    }

    public function getCreateCoursePage()
    {
        $courseCategories = CourseCategory::all();
        return view('user.create_course', ['courseCategories' => $courseCategories]);
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

        return redirect()->route('profile');
    }
}
