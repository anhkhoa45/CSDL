<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class AdminController extends Controller
{
    use AuthenticatesUsers;
    public function showLogin()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $admin=$request['email'];
      //  echo $admin;
        $password=$request['password'];
      /*  $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|max:30'
        ]);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }*/

        // Attempt to log the user in
        if (auth()->guard('admin')->attempt(['email' => $admin, 'password' => $password], $request->remember))
        {
            // if successful, then redirect to their intended location
            return redirect()->route('admin.home');
        }
        // if unsuccessful, then redirect back to the login with the form data

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
    public function home()
    {
        return view('admin.home');
    }



    public function profile()
    {
        return view('admin.profile');
    }
}
