<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\CourseCategory;


class CategoryManageController extends Controller
{
    //
    public function categories()
    {
        $categories=DB::select("SELECT course_categories.*,count(course_categories.id) as CountCourse  
                                  FROM course_categories,courses
                                  WHERE course_categories.id = courses.course_category_id
                                  GROUP BY course_categories.id 
                                  UNION
                                  SELECT course_categories.*, '0' as CountCourse
                                  FROM course_categories
                                  WHERE course_categories.id not in (SELECT courses.course_category_id FROM courses)
                                  ");
        /// dd($categories);
        return view('admin.categories.home',['categories'=>$categories]);
    }
    public function categoriesShow($id)
    {
        $categories=DB::select("SELECT course_categories.*,count(course_categories.id) as CountCourse  
                                  FROM course_categories,courses
                                  WHERE course_categories.id = courses.course_category_id
                                        AND course_categories.id=$id
                                  GROUP BY course_categories.id 
                                  UNION
                                  SELECT course_categories.*, '0' as CountCourse
                                  FROM course_categories
                                  WHERE course_categories.id= $id AND course_categories.id not in (SELECT courses.course_category_id FROM courses)
                                  ");
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
        $categories=CourseCategory::orderBy('name')->paginate(10);
        //dd($categories);
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
        return redirect()->route('admin.categories.show',['categories'=>$categories]);
    }
    public function categoriesDestroy($id)
    {
        CourseCategory::findOrFail($id)->delete();
        return redirect()->route('admin.categories');
    }
    public function categoriesSearch()
    {
        $categories = CourseCategory::where(DB::raw('LOWER("name")'), 'like', '%'.strtolower(request()->name).'%')->orderBy('name')->paginate(10);

        return view('admin.categories.home', ['categories' => $categories]);
    }

}
