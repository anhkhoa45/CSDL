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
            <div class="container">
              <div class="irs-courses-details-thumb">
                <img class="img-responsive img-fluid" src="{{ Storage::url($course->cover) }}" alt="cd1.jpg">
              </div>
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
                    <form action="{{ route('user.rate_course', ['course' => $course->id]) }}" method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" class="rating"
                             data-filled="text-thm2 fa fa-star"
                             data-filled-selected="text-thm2 fa fa-star"
                             data-empty="text-thm2 fa fa-star-o"
                             value="{{ $course->pivot->rating }}" name="rating"/>
                      <button type="submit" style="color: gold; background: none; border: none">Update my rating
                      </button>
                    </form>
                  </li>
                </ul>
                <p style="margin-top: 50px;">{{ $course->description }}</p>
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
                            @foreach($courseContents as $courseContent)
                              <li>
                                @if(get_class($courseContent) === \App\Video::class )
                                  <a class="list-group-item" href="{{ route('user.watch_video', ['course' => $course->id, 'video' => $courseContent->id]) }}">
                                    <ul class="list-inline">
                                      <li>
                                        <span class="flaticon-business text-thm2"></span> Video
                                        #{{ $courseContent->order_in_course}} </li>
                                      <li>
                                        <div class="its-tdu">{{ $courseContent->name }} </div>
                                      </li>
                                      <li>
                                        <div class="its-tdu">{{ $courseContent->name }} </div>
                                      </li>
                                    </ul>
                                  </a>
                                @elseif(get_class($courseContent) === \App\RequiredProject::class )
                                  <a class="list-group-item" href="{{ route('user.get_submit_project', ['course' => $course->id, 'project' => $courseContent->id]) }}">
                                    <ul class="list-inline">
                                      <li>
                                        <span class="flaticon-pen text-thm2"></span> Project
                                        #{{ $courseContent->order_in_course }} </li>
                                      <li>
                                        <div class="its-tdu">{{ $courseContent->name }} </div>
                                      </li>
                                    </ul>
                                  </a>
                                @endif
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

@section('script')
  <script type="text/javascript" src="{{ asset('js/bootstrap-rating.min.js') }}"></script>
  <script>
      $(document).ready(() => {
          $(".rating").rating({
              start: 0,
              stop: 5,
          });
      });
  </script>
@endsection