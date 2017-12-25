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
            <div class="col-md-6">
                <h2>Courses list</h2>
            </div>

        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Cost</th>
                <th>Status</th>
                <th>Teacher</th>
                <th>Category</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @php
                $count = 1;
            @endphp

            @foreach($pCourses as $course)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->cost}}</td>
                    <td>{{ $course->status}}</td>
                    <td>{{ $course->teacher_id}}</td>
                    <td>{{ $course->course_category_id}}</td>
                    <td>{{ $course->created_at}}</td>
                    <td>{{ $course->updated_at}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.showPendingCourseInformation')}}">View</a>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection