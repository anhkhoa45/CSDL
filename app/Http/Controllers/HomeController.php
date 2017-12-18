<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\ChangeUserPassword;
use App\Http\Requests\UpdateUser;
use App\Http\Requests\UpdateUserAvatar;
use App\Http\Requests\UpdateUserBalance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function profile(Request $request)
    {
        $sortBy = $request->sort_by;

        $user = auth()->user();
        $paginate = config('view.paginate');
        $teachingCourses = $user->teachingCourses()->with('buyers')->orderBy('created_at', 'desc')->get();

        $todayPay = DB::select("SELECT users.id as id,SUM(courses.cost) as pay 
            FROM  courses, buy_courses, users
            WHERE users.id = $user->id
            AND courses.id = buy_courses.course_id
            AND users.id = buy_courses.buyer_id
            AND (extract(day from now())=extract(day from date_bought))
            AND (extract(month from now())=extract(month from date_bought))
            AND (extract(year from now())=extract(year from date_bought))
            GROUP BY users.id");

//        dd($todayPay);

        $weekPay = DB::select("SELECT users.id as id, SUM(courses.cost) as pay 
            AND (extract(month from now()) = extract(month from date_bought))
            AND (extract(year from now()) = extract(year from date_bought))
            GROUP BY users.id');
            AND (extract(month from now())=extract(month from date_bought))
            AND (extract(year from now())=extract(year from date_bought))
            GROUP BY users.id");

//        dd($weekPay);
        
        $totalPay = DB::select('SELECT users.id as id, SUM(courses.cost) as pay 
            FROM  courses, buy_courses, users
            WHERE courses.id = buy_courses.course_id
            AND users.id = buy_courses.buyer_id
            GROUP BY users.id');
        $todaySale = DB::select('SELECT courses.teacher_id as id,SUM(courses.cost) as sale
                                       FROM courses,users u1,users u2,buy_courses
                                       WHERE u1.id = courses.teacher_id
                                       AND u2.id = buy_courses.buyer_id
                                       AND courses.id = buy_courses.course_id
                                       AND (extract(day from now()) =extract(day from date_bought))
                                       AND (extract(month from now())=extract(month from date_bought))
                                       AND (extract(year from now())=extract(year from date_bought))
                                       GROUP BY courses.teacher_id;');
        $weekSale = DB::select('SELECT courses.teacher_id as id,SUM(courses.cost) as sale
                                       FROM courses,users u1,users u2,buy_courses
                                       WHERE u1.id = courses.teacher_id
                                       AND u2.id = buy_courses.buyer_id
                                       AND courses.id = buy_courses.course_id
                                       AND (extract(day from now())-extract(day from date_bought)<=7)
                                       AND (extract(month from now())=extract(month from date_bought))
                                       AND (extract(year from now())=extract(year from date_bought))
                                       GROUP BY courses.teacher_id;');
        $totalSale = DB::select('SELECT courses.teacher_id as id,SUM(courses.cost) as sale
                                       FROM courses,users u1,users u2,buy_courses
                                       WHERE u1.id = courses.teacher_id
                                       AND u2.id = buy_courses.buyer_id
                                       AND courses.id = buy_courses.course_id
                                       GROUP BY courses.teacher_id;');

        $data = [
            'user' => $user,
            'teachingCourses' => $teachingCourses,
            'todayPay' => $todayPay,
            'weekPay' => $weekPay,
            'totalPay' => $totalPay,
            'todaySale' => $todaySale,
            'weekSale' => $weekSale,
            'totalSale' => $totalSale
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
            ->with('page', 'update_ava');
    }

    public function updateBalance(UpdateUserBalance $request)
    {
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

        if (DB::table('buy_courses')->where('buyer_id', $user->id)->where('course_id', $course_id)->count()) {
            return redirect()->back()->withErrors(['Permission denied']);
        }

        if ($user->balance < $course->cost) {
            return redirect()->route('profile')
                ->with('page', 'update_balance')
                ->withErrors(['balance' => 'Your balance id not enough, add some money to continue']);
        }
        DB::beginTransaction();
        try {
            auth()->user()->enrolledCourses()->attach($course_id, ['date_bought' => Carbon::now()]);

            auth()->user()->update([
                'balance' => auth()->user()->balance - $course->cost,
            ]);

            $course->teacher()->update([
                'balance' => $course->teacher->balance + $course->cost,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('profile')
                ->with('page', 'update_balance')
                ->withErrors(['error' => 'Server internal error']);
        }

        return redirect()->route('user.learn_course', ['id' => $course_id]);
    }

    public function enrolledCourses()
    {
        $user = auth()->user();

        $enrolledCourses = $user->enrolledCourses()->with('teacher')
            ->orderBy('date_bought', 'desc')
            ->paginate(config('view.paginate'));

        $data = [
            'courses' => $enrolledCourses
        ];

        return view('user.learning-zone.enrolled_courses', $data);
    }
}