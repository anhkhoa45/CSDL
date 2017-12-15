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

                        <li class="irs-sblc-price text-thm2">${{$course->cost}}</li>
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
        <div class="col-sm-12 col-md-4 col-lg-3">
          <div class="irs-sb-courses">
            <h3 class="irs-sblc-title text-center">Courses</h3>
            <ul class="list-unstyled irs-sbc-list">
              <li class="active"><a href="#"><span class="flaticon-arrows-3"></span> All Courses</a></li>
              <li><a href="#"><span class="flaticon-arrows-3"></span> Celtic Studies</a></li>
              <li><a href="#"><span class="flaticon-arrows-3"></span> Chemical Engineering</a></li>
              <li><a href="#"><span class="flaticon-arrows-3"></span> Communication & Media Studies</a></li>
              <li><a href="#"><span class="flaticon-arrows-3"></span> Chemistry</a></li>
              <li><a href="#"><span class="flaticon-arrows-3"></span> Civil Engineering</a></li>
              <li><a href="#"><span class="flaticon-arrows-3"></span> Classics & Ancient History</a></li>
            </ul>
          </div>
          <div class="irs-sb-lcourses">
            <h3 class="irs-sbc-title text-center">Latest Courses</h3>
            <div class="irs-sblc-pack">
              <div class="irs-lc-thumb">
                <img class="img-responsive" src="images/courses/s7.png" alt="s7.png">
                <div class="irs-sblc-overlay"></div>
              </div>
              <div class="irs-sblc-details">
                <h5>Chemical Engineering & Best Technology</h5>
                <p class="irs-sblc-price text-thm2">$49.99</p>
              </div>
            </div>
            <div class="irs-sblc-pack">
              <div class="irs-lc-thumb">
                <img class="img-responsive" src="images/courses/s8.png" alt="s8.png">
                <div class="irs-sblc-overlay"></div>
              </div>
              <div class="irs-sblc-details">
                <h5>Electrical & Electronic Engineering</h5>
                <p class="irs-sblc-price text-thm2">$49.99</p>
              </div>
            </div>
            <div class="irs-sblc-pack">
              <div class="irs-lc-thumb">
                <img class="img-responsive" src="images/courses/s9.png" alt="s9.png">
                <div class="irs-sblc-overlay"></div>
              </div>
              <div class="irs-sblc-details">
                <h5>Geography Environmental Sciences</h5>
                <p class="irs-sblc-price text-thm2">$49.99</p>
              </div>
            </div>
          </div>
          <div class="irs-sb-bcome-teacher">
            <div class="irs-sb-bct-details text-center">
              <h3>Become an Instructor Today!</h3>
              <a href="#" class="btn btn-lg irs-btn-thm2"> Read More</a>
            </div>
          </div>
          <div class="irs-sb-lcourses">
            <h3 class="irs-sbc-title text-center">Latest News</h3>
            <div class="irs-sblc-pack">
              <div class="irs-lc-thumb">
                <img class="img-responsive" src="images/blog/xs4.png" alt="xs4.png">
                <div class="irs-sblc-overlay"></div>
              </div>
              <div class="irs-sblc-details">
                <h5>Social benefits: universal or targeted?</h5>
                <p class="irs-sblc-price text-thm2"><span class="text-thm2 flaticon-clock"></span> 20/02/2017</p>
              </div>
            </div>
            <div class="irs-sblc-pack">
              <div class="irs-lc-thumb">
                <img class="img-responsive" src="images/blog/xs5.png" alt="xs4.png">
                <div class="irs-sblc-overlay"></div>
              </div>
              <div class="irs-sblc-details">
                <h5>Educational integration: religion and society</h5>
                <p class="irs-sblc-price text-thm2"><span class="text-thm2 flaticon-clock"></span> 19/02/2017</p>
              </div>
            </div>
            <div class="irs-sblc-pack">
              <div class="irs-lc-thumb">
                <img class="img-responsive" src="images/blog/xs6.png" alt="xs4.png">
                <div class="irs-sblc-overlay"></div>
              </div>
              <div class="irs-sblc-details">
                <h5>The importance of good (politic) communicate</h5>
                <p class="irs-sblc-price text-thm2"><span class="text-thm2 flaticon-clock"></span> 18/02/2017</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection