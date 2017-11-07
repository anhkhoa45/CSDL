@extends('layouts.main')

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
                    <li class="active"><a href="">My profile</a></li>
                    <li><a href="">Enrolled Courses</a></li>
                    <li><a href="">Teaching Courses</a></li>
                </ul>
            </div>
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>My profile</h3></div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('DOB') ? ' has-error' : '' }}">
                                <label for="DOB" class="col-md-4 control-label">Date of birth</label>

                                <div class="col-md-6">
                                    <input id="DOB" type="text" class="form-control" name="DOB" value="{{ Auth::user()->DOB }}">

                                    @if ($errors->has('DOB'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('DOB') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                <label for="gender" class="col-md-4 control-label">Gender</label>

                                <div class="col-md-6">
                                    <input id="gender" type="text" class="form-control" name="gender" value="{{ Auth::user()->gender }}">

                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" value="{{ Auth::user()->address }}">

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('balance') ? ' has-error' : '' }}">
                                <label for="balance" class="col-md-4 control-label">Balance</label>

                                <div class="col-md-6">
                                    <input id="balance" type="text" class="form-control" name="balance" value="{{ Auth::user()->balance }}">

                                    @if ($errors->has('balance'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('balance') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                <label for="avatar" class="col-md-4 control-label">Avatar</label>

                                <div class="col-md-6">
                                    <img class="img-responsive img-rounded" src="{{ Storage::url(Auth::user()->avatar) }}" alt="Avatar">
                                    <input id="avatar" type="file" class="form-control" name="avatar">

                                    @if ($errors->has('avatar'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('avatar') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
