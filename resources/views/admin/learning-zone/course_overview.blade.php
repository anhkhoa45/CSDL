@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="{{asset('css/bootstrap-rating.css')}}">
@endsection

@section('content')
    <section class="irs-ip-details irs-padb-svnty">
        <div class="row clearfix">
            <div class="col-sm-12 clearfix">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="irs-courses-details-thumb">
                            <img class="img-responsive img-fluid" src="{{ Storage::url($course->cover) }}" alt="cd1.jpg">
                        </div>
                        <div class="container">
                            <div class="irs-courses-details-title">
                                <h2>{{ $course->name }}</h2>
                                <ul class="list-inline irs-cl-teacher-info">
                                    <li class="irs-cl-thumb">
                                        <img style="max-height: 50px; max-width: 50px; border-radius: 50%;"
                                             src="{{ Storage::url($course->teacher->avatar) }}"
                                             alt="s4.png">
                                    </li>
                                    <li class="irs-cl-info">with
                                        <a href="{{ route('teacher-info', ['id' => $course->teacher->id]) }}">
                                            <span class="text-thm2"> {{ $course->teacher->name }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="btn btn-success"
                                           href="{{ route('admin.course.approve',['course'=>$course->id] ) }}">Approve</a>
                                    </li>
                                    <li>
                                        <a class="btn btn-danger"
                                           href="{{ route('admin.course.refuse',['course'=>$course->id] ) }}">Refuse</a>
                                    </li>
                                    <li>
                                        <a class="btn btn-primary"
                                           href="{{ route('admin.courses') }}">Back</a>
                                    </li>
                                </ul>
                                <p  style="margin-top: 50px;">{{ $course->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row irs-mrngtp-svnty">
                        <div class="col-lg-12">
                            <div class="irs-courses-details">
                                <div class="irs-cdetails-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#curriculum" aria-controls="curriculum" role="tab" data-toggle="tab">
                                                Lectures
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="curriculum">
                                            <div class="col-md-12">
                                                <div class="irs-cdtls-feture-bot2">
                                                    <ul class="list-group">
                                                        @foreach($course->videos()->orderBy('order_in_course')->get() as $video)
                                                            <li>
                                                                <a class="list-group-item"
                                                                   href="{{ route('user.watch_video', ['course' => $course->id, 'video' => $video->id]) }}">
                                                                    <ul class="list-inline">
                                                                        <li><span class="flaticon-business text-thm2"></span> Video
                                                                            #{{$video->order_in_course}} </li>
                                                                        <li>
                                                                            <div class="its-tdu">{{$video->name}} </div>
                                                                        </li>
                                                                    </ul>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>

                                                    <ul class="list-group">
                                                        @foreach($course->projects as $project)
                                                            <li>
                                                                <a class="list-group-item" href="#">
                                                                    <ul class="list-inline">
                                                                        <li><span class="flaticon-business text-thm2"></span> Project
                                                                            #{{$project->order_in_course}} </li>
                                                                        <li>
                                                                            <div class="its-tdu">{{$project->project_name}} </div>
                                                                        </li>
                                                                    </ul>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
