<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('user.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(){
        return view('user.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUser|Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request){
        $imagePath = $request->user()->avatar;

        if(isset($request->avatar)) {
            $imagePath = $request->file('avatar')->storeAs(
                'public/users/avatars',
                $request->user()->id
            );
        }

        $request->user()->update([
            'name' => request()->name,
            'DOB' => request()->DOB,
            'address' => request()->address,
            'gender' => request()->gender,
            'balance' => request()->balance,
            'avatar' => $imagePath,
        ]);

        return redirect()->route('profile')
            ->with('success','Your profile updated successfully ');
    }

    public function enrollCourse($course){
        \Auth::user()->enrolled_courses()->attach($course, ['date_bought' => Carbon::now()]);
        return 'Enroll successfully';
    }
}
