@extends('admin.layouts.app')

@section('styles')
    <style>
        .actions-head {
            padding: 30px 0;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
        .new-btn {
            margin-right: 20px;
        }
        .pagination {
            text-align: center;
        }
        .form-inline {
            display:inline;
        }
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif


        </div>
            @foreach($pCourses as $course)
                    <div class="col-md-6">
                        <h2>{{$course->name}}</h2>

                        <p>{{ $course->cost}}</p>
                        <p>{{ $course->status}}</p>
                        <p>{{ $course->teacher_id}}</p>
                        <p>{{ $course->course_category_id}}</p>
                        <p>{{ $course->created_at}}</p>
                        <p>{{$course->updated_at}}</p>
                    </div>
            @endforeach
    </div>

@endsection