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

class HomeController extends Controller
{
    public function profile(Request $request)
    {
        $sortBy = $request->sort_by;

        $user = auth()->user();
        $paginate = config('view.paginate');
        $teachingCourses = $user->teachingCourses()->with('buyers')->paginate($paginate);

        $data = [
            'user' => $user,
            'teachingCourses' => $teachingCourses
        ];
        return view('user.profile', $data);
    }

    public function updateInfo(UpdateUser $request)
    {
        auth()->user()->update($request->all());

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

        auth()->user()->update([
            'avatar' => $imagePath,
        ]);

        return redirect()->route('profile')
            ->with('success', 'Your profile updated successfully ')
            ->with('page', 'update_avatar');
    }
    
    public function updateBalance(UpdateUserBalance $request){
        auth()->user()->update($request->all());

        return redirect()->route('profile')
            ->with('success', 'Your balance updated successfully ');
    }

    public function changePassword(ChangeUserPassword $request)
    {
        $user = auth()->user();

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->route('profile')
                ->with('page', 'change_password')
                ->withErrors(['old_password' => 'Password does not match']);
        }
        $user->update(['password' => bcrypt($request->password)]);

        return view('profile')
            ->with('success', 'Your profile updated successfully ');
    }

    public function enrollCourse($course_id)
    {
        $user = auth()->user();
        $course = Course::findOrFail($course_id);

        if(DB::table('buy_courses')->where('buyer_id', $user->id)->where('course_id', $course_id)->count()){
            return redirect()->back()->withErrors(['Permission denied']);
        }

        if($user->balance < $course->cost){
            return redirect()->route('profile')
                ->with('page', 'update_balance')
                ->withErrors(['balance' => 'Your balance id not enough, add some money to continue']);
        }

        auth()->user()->enrolledCourses()->attach($course_id, ['date_bought' => Carbon::now()]);

        auth()->user()->update([
            'balance' => auth()->user()->balance - $course->cost,
        ]);

        $course->teacher()->update([
           'balance' => $course->teacher->balance + $course->cost,
        ]);

        return redirect()->route('user.learn_course', ['id' => $course_id]);
    }

    public function enrolledCourses()
    {
        $user = auth()->user();

        $enrolledCourses = $user->enrolledCourses()->with('teacher', 'buyers')->paginate(config('view.paginate'));

        $data = [
            'courses' => $enrolledCourses
        ];

        return view('user.learning-zone.enrolled_courses', $data);
    }

    public function teachingCourses()
    {
//        $user = auth()->user();
//
//        $teachingCourses = $user->teachingCourses()->with('buyers')->paginate(12);
//
//        $data = [
//            'courses' => $teachingCourses
//        ];
//
//        return view('user.learning-zone.enrolled_courses', $data);
    }

    public function teachingCourseDetail($course_id)
    {
//        $user = auth()->user();
//        $course = $user->teachingCourses()->findOrFail($course_id);
//
    }

}
