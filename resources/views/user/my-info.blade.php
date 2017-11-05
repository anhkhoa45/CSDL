@extends('layouts.app')

@section('style')
    <style>
        .user-links{
            background: white;
            padding: 15px 15px;
            list-style: none;
        }

        .user-links li{
            background: white;
            margin: 15px 0;
        }

        .user-links li.active{
            font-weight: bold;
        }
    </style>

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 panel panel-default">
            <ul class="user-links">
                <li class="active"><a href="">My info</a></li>
                <li><a href="">Enrolled Courses</a></li>
                <li><a href="">Teaching Courses</a></li>
            </ul>
        </div>
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">My info</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p><strong>Name: </strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email: </strong> {{ Auth::user()->email }}</p>
                    <p><strong>Date of birth: </strong> {{ Auth::user()->DOB }}</p>
                    <p><strong>Gender: </strong> {{ Auth::user()->gender }}</p>
                    <p><strong>Address: </strong> {{ Auth::user()->address }}</p>

                    <a class="btn btn-primary" href="">Update info</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
