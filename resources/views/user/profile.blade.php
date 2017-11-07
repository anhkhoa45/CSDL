@extends('layouts.main')

@section('style')
  <style>
    .user-links {
      background: white;
      padding: 15px 15px;
      list-style: none;
    }

    .user-links li {
      background: white;
      margin: 15px 0;
    }

    .user-links li.active {
      font-weight: bold;
    }

    .t-center {
      text-align: center;
    }
  </style>
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-3 panel panel-default">
        <ul class="user-links">
          <li class="active"><a href="">My profile</a></li>
          <li><a href="">Enrolled Courses</a></li>
          <li><a href="">Teaching Courses</a></li>
        </ul>
      </div>
      <div class="col-md-8 col-md-offset-1">
        @if (Session::has('success'))
          <div class="alert alert-success">
            <p>{{ Session::get('success') }}</p>
          </div>
        @endif
        <div class="panel panel-default">
          <div class="panel-heading"><h3>My profile</h3></div>

          <div class="panel-body">
            <div class="row">
              <div class="col-md-8">
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
                <p><strong>Learning score: </strong> {{ Auth::user()->learning_score }}</p>
                <p><strong>Teaching score: </strong> {{ Auth::user()->teaching_score }}</p>

                <a class="btn btn-primary" href="{{ route('user.edit') }}">Update info</a>
              </div>
              <div class="col-md-4 t-center">
                <h4>Avatar</h4>
                <img class="img-responsive img-rounded" src="{{ Storage::url(Auth::user()->avatar) }}" alt="Avatar">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
