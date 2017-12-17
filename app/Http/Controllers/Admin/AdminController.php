<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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

    public  function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.show_login');
    }
    //users
    public function users()
    {
        $users=User::orderBy('name')->paginate(10);
        return view('admin.users.home',['users'=>$users]);
    }
    public function usersEdit()
    {
        $user=User::findOrFail($id);return view('admin.users.edit',['user'=>$user]);
    }
    public function usersUpdate(Request $request, $id)
    {
        $user=User::findOrFail($id);
        $user->update([
           'id'=>request()->user_id,
            'name'=> request()->name,
            'email'=> request()->email,
            'DOB'=> request()->birthday,
            'address'=> request()->address,

        ]);
    }
    public function usersShow($id)
    {
        $user=User::findOrFail($id);
    return view('admin.users.show',['user'=>$user]);
    }

    //
    public function profile()
    {
        return view('admin.profile');
    }
    public function guard()
    {
        return Auth::guard('admin');
    }
}
