<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\CourseCategory;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\DB;

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
        $password=$request['password'];

        if (auth()->guard('admin')->attempt(['email' => $admin, 'password' => $password], $request->remember))
        {
            return redirect()->route('admin.home');
        }

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
    //Users
    public function users()
    {
        $users=User::orderBy('name')->paginate(10);
        return view('admin.users.home',['users'=>$users]);
    }
    public function usersEdit($id)
    {
        $user=User::findOrFail($id);
        return view('admin.users.edit',['user'=>$user]);
    }
    public function usersUpdate(Request $request, $id)
    {
        $user=User::findOrFail($id);
        $user->update([
            'name'=> $request['name'],
            'email'=>$request['email'] ,
            'DOB'=>$request['birthday'],
            'address'=> $request['address'],
            'gender'=>$request['gender'],

        ]);
        $user=User::findOrFail($id);
        return view('admin.users.show',['user'=>$user])->with('Success','Users profile updated successfully   ');
    }
    public function usersShow($id)
    {
        $user=User::findOrFail($id);
    return view('admin.users.show',['user'=>$user]);
    }
    public function usersCreate()
    {
        return view('admin.users.create');
    }
    public function usersStore(Request $request)
    {
        $user= New User();
        $user->fill([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'DOB'=>$request['birthday'],
            'gender'=>$request['gender'],
            'address'=>$request['address'],
            'balance'=>rand(0,1000),
            'password'=>\Hash::make('123456'),
        ]);
        $user->save();
        return redirect()->route('admin.users')
            ->with('success','Student profile created successfully ');

    }

    public function storeAdmin(Request $request)
    {
        $admin=New Admin();
        $admin->fill([
           'name' =>$request['name'],
            'email'=>$request['email'],
            'DOB'=>$request['birthday'],
            'gender'=>$request['gender'],
            'address'=>$request['address'],
            'password'=>\Hash::make('123456'),
        ]);
        $admin->save();
    return redirect()->route('admin.home');
    }

    public function usersSearch()
    {
        $user = User::where('name', 'like', '%'.request()->name.'%')->orderBy('name')->paginate(10);

        return view('admin.users.home', ['users' => $user]);
    }

    public function usersDestroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users');
    }


    //Admin
    public function createAdmin()
    {
        return view('admin.create');
    }
    public function profile($id)
    {
        $admin=Admin::findOrFail($id);
        return view('admin.profile',['admin'=>$admin]);
    }
    public function update(Request $request,$id)
    {
        $admin=Admin::findOrFail($id);
        $admin->update([
            'name'=> $request['name'],
            'email'=>$request['email'] ,
            'DOB'=>$request['birthday'],
            'address'=> $request['address'],

        ]);
        return view('admin.profile',['admin'=>$admin])->with('Success','Admin profile updated successfully ');
    }
    public function edit($id)
    {
        $admin=Admin::findOrFail($id);
        return view('admin.edit',['admin'=>$admin]);
    }

    //Catagories
    public function categories()
    {
        $categories=DB::select("SELECT course_categories.*,count(course_categories.id) as CountCourse  
                                  FROM course_categories,courses
                                  WHERE course_categories.id = courses.course_category_id
                                  GROUP BY course_categories.id ");
        return view('admin.categories.home',['categories'=>$categories]);
    }
    public function categoriesShow($id)
    {
        $categories=DB::select("SELECT course_categories.*,count(course_categories.id) as CountCourse  
                                  FROM course_categories,courses
                                  WHERE course_categories.id = courses.course_category_id
                                    AND course_categories.id=$id
                                  GROUP BY course_categories.id ");
        //dd($categories);
        return view('admin.categories.show',['categories'=>$categories]);
    }
    public function categoriesCreate()
    {
        return view('admin.categories.create');
    }
    public function categoriesStore(Request $request)
    {
        $categories= New CourseCategory();
        $categories->fill([
            'name'=>$request['name'],
        ]);
        $categories->save();
        return redirect()->route('admin.categories');
    }
    public function categoriesEdit($id)
    {
        $categories=CourseCategory::findOrFail($id);
        return view('admin.categories.edit',['categories'=>$categories]);
    }
    public function categoriesUpdate(Request $request,$id)
    {
        $categories=CourseCategory::findOrFail($id);
        $categories->update([
           'name'=>$request['name'],
        ]);
        return redirect()->route('admin.categories.show',['catelogies']);
    }
    public function categoriesDestroy($id)
    {
        CourseCategory::findOrFail($id)->delete();
        return redirect()->route('admin.categories');
    }
    public function categoriesSearch()
    {
        $categories = CourseCategory::where('name', 'like', '%'.request()->name.'%')->orderBy('name')->paginate(10);

        return view('admin.categories.home', ['categories' => $categories]);
    }

    //
    public function guard()
    {
        return Auth::guard('admin');
    }
}
