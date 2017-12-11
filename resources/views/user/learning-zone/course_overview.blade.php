@extends('layouts.main')

@section('style')
  <style>
    .irs-bb-right {
      margin-bottom: 0;
    }
  </style>
@endsection

@section('content')

  <!-- Breadcrumbs html -->
  <section class="irs-ip-brdcrumb">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-right irs-bb-right">
          <ul class="list-inline irs-brdcrmb">
            <li><a href="#">Home</a></li>
            <li><a href="#"> > </a></li>
            <li><a href="#">Courses</a></li>
            <li><a href="#"> > </a></li>
            <li><a class="active" href="#">Grid</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="irs-ip-details irs-padb-svnty">
    <div class="container">
      <div class="row clearfix">
        <div class="col-sm-12 col-md-8 col-lg-9 clearfix">
          <div class="row">
            <div class="col-lg-12">
              <div class="irs-courses-details-title">
                <h2>{{ $course->name }}</h2>
                <ul class="list-inline irs-cl-teacher-info">
                  <li class="irs-cl-thumb">
                    <img style="height: 50px; width: 50px" src="{{ Storage::url($course->teacher_avatar) }}" alt="s4.png">
                  </li>
                  <li class="irs-cl-info">with
                    <a href="{{ route('teacher-info', ['id' => $course->teacher_id]) }}">
                      <span class="text-thm2"> {{ $course->teacher_name }}</span>
                    </a>
                  </li>
                  <li><span class="text-thm2 flaticon-social-2"></span> {{ $course->buyers }}</li>
                  <li><span class="text-thm2 flaticon-interface-1"></span> 10</li>
                  <li><span class="text-thm2 flaticon-folder"></span> Languages / Foreign</li>
                </ul>
              </div>
              <div class="irs-courses-details-thumb">
                <img class="img-responsive img-fluid" src="{{ Storage::url($course->cover) }}" alt="cd1.jpg">
              </div>
            </div>
          </div>
          <div class="row irs-mrngtp-svnty">
            <div class="col-lg-12">
              <div class="irs-courses-details">
                <div class="irs-cdetails-tab">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                      <a href="#curriculum" aria-controls="curriculum" role="tab" data-toggle="tab">
                        Lectures
                      </a>
                    </li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="curriculum">
                      <div class="col-md-12">
                        <div class="irs-cdtls-feture-bot2">
                          <ul class="list-group">
                            @foreach($course->videos()->orderBy('order_in_course')->get() as $video)
                              <li>
                                <a class="list-group-item" href="#">
                                  <ul class="list-inline">
                                    <li><span class="flaticon-business text-thm2"></span> Video
                                      #{{$video->order_in_course}} </li>
                                    <li>
                                      <div class="its-tdu">{{$video->name}} </div>
                                    </li>
                                    <li><span class="btn btn-sm irs-btn-thm3"> Preview</span></li>
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
                                    <li><span class="btn btn-sm irs-btn-thm3"> Preview</span></li>
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