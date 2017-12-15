@extends('layouts.main')

@section('style')
  <style>
    .irs-bb-right {
      margin-bottom: 0;
    }
  </style>
@endsection

@section('content')
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

  <section class="irs-ip-details">
    <div class="container">
      <div class="row clearfix">
        <div class="col-sm-12 col-md-8 col-lg-9 clearfix">
          <div class="irs-courses-shorting-heading clearfix">
            <ul class="list-inline pull-left">
              <li><a href="#"><span class="flaticon-squares text-thm2"></span></a></li>
              <li>
                <a href="#">
                  Showing {{ ($courses->currentPage()-1)*12 }}-{{ $courses->currentPage()*12 < $courses->total() ? $courses->currentPage()*12:$courses->total() }} of {{ $courses->total() }} results
                </a>
              </li>
            </ul>
            <div class="input-group irs-nav-search-form">
              <input type="text" class="form-control pull-right" placeholder="Search courses">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button"><span class="flaticon-musica-searcher"></span></button>
              </span>
            </div>
          </div>
          <div class="row irs-all-course-bb clearfix">
            @foreach($courses as $course)
            <div class="col-sm-6 col-md-6 col-lg-4 clearfix">
              <div class="irs-lc-grid style2 text-center">
                <div class="irs-lc-grid-thumb">
                  <a href="{{ route('user.learn_course', ['id' => $course->id ]) }}">
                    <img class="img-responsive img-fluid" src="{{ Storage::url($course->avatar) }}" alt="5.jpg">
                  </a>
                </div>
                <div class="irs-lc-details">
                  <a href="{{ route('teacher-info', ['id' => $course->teacher->id]) }}">
                    <div class="irs-lc-teacher-info">
                      <div class="irs-lct-thumb">
                        <img style="border-radius: 50%; max-width: 50px; max-height: 50px"
                             src="{{ Storage::url($course->teacher->avatar) }}" alt="s3.png">
                      </div>
                      <div class="irs-lct-info" style="margin-left: 20px;">
                        with <span class="text-thm2">{{ $course->teacher->name }}</span>
                      </div>
                    </div>
                  </a>
                  <h4><a href="{{ route('user.learn_course', ['id' => $course->id ]) }}">{{ $course->name }}</a></h4>
                </div>
                <a href="{{ route('user.learn_course', ['id' => $course->id ]) }}">
                  <div class="irs-lc-footer">
                    <div class="irs-lc-normal-part">
                      <ul class="list-inline">
                        <li><a href="#"><i class="fa fa-users"></i> {{ $course->buyers->count() }}</a></li>
                        <li><span class="text-thm2 fa fa-star" aria-hidden="true"></span> {{ number_format($course->avg_rating, 0) }}</li>
                      </ul>
                    </div>
                    <div class="irs-lc-hover-part">See Course</div>
                  </div>
                </a>
              </div>
            </div>
            @endforeach
          </div>
          {{ $courses->links() }}
        </div>
        @include('includes.right-sidebar')
      </div>
    </div>
  </section>
@endsection