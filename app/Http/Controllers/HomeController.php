<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeUserPassword;
use App\Http\Requests\UpdateUser;
use App\Http\Requests\UpdateUserAvatar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            ->with('success','Your profile updated successfully ')
            ->with('page', 'update_info');
    }

    public function updateAvatar(UpdateUserAvatar $request)
    {
        $imagePath = $request->user()->avatar;

        if(isset($request->avatar)) {
            $imagePath = $request->file('avatar')->storeAs(
                'public/users/avatars',
                $request->user()->id
            );
        }

        $request->user()->update([
            'avatar' => $imagePath,
        ]);

        return redirect()->route('profile')
            ->with('success','Your profile updated successfully ')
            ->with('page', 'update_avatar');
    }

    public function changePassword(ChangeUserPassword $request)
    {
        $user = auth()->user();

        if(!Hash::check($request->old_password, $user->password)){
            return redirect()->route('profile')
                ->withErrors(['old_password' => 'Password does not match']);
        }
        $user->update(['password' => bcrypt($request->password)]);
        return view('profile')
            ->with('success','Your profile updated successfully ');
    }

    public function enrollCourse($course){
        \Auth::user()->enrolled_courses()->attach($course, ['date_bought' => Carbon::now()]);
        return 'Enroll successfully';
    }
}
