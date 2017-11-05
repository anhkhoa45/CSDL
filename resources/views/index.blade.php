@extends('layouts.main')

@section('style')
  <style>
    .pagination-links{
      text-align: center;
      margin-top: 100px;
    }
  </style>
@endsection

@section('content')

  {{--@include('includes.slider')--}}

  <!-- Services Section -->
  <section class="irs-courses-one">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs irs-course-tab" role="tablist">
              <li class="irs-course-title pull-left"><h3>Edu Hub Courses</h3></li>
              <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Top Rated</a></li>
              <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Most Popular</a></li>
              <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Recently Added</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="home">
                @foreach($courses as $course)
                  <div class="col-xs-12 col-sm-6 col-md-3 irs-ext-pad animatedParent">
                    <div class="irs-courses-fstcol animated fadeIn delay-250">
                      <div class="irs-course-thumb"><img class="img-responsive img-fluid" src="images/courses/1.jpg" alt="1.jpg"></div>
                      <div class="irs-course-details">
                        <ul class="list-inline">
                          <li class="irs-user"><a href="#"><span class="flaticon-people-1"></span> {{ $course->buyers->count() }}</a></li>
                          <li class="irs-ccomment"><a href="#"><span class="flaticon-interface"></span> 4</a></li>
                          <li class="irs-course-price"><a href="#" class="text-thm2"><span class=""></span> ${{ $course->cost }}</a></li>
                        </ul>
                        <h3><a href="#">{{ $course->name }}</a></h3>
                        <div class="irs-student-info">
                          <div class="irs-studend-thumb"> <img src="images/resource/student1.png" alt="student1.png"> </div>
                          <div class="irs-student-name"><a href="">with <span class="text-thm2">{{ $course->teacher->name }}</span></a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
                  <div class="pagination-links col-xs-12 irs-ext-pad animatedParent">
                    {{--{{ $courses->links() }}--}}
                  </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="profile">
                <div class="col-xs-12 col-sm-6 col-md-3 irs-ext-pad animatedParent">
                  <div class="irs-courses-fstcol animated fadeIn delay-250">
                    <div class="irs-course-thumb"><img class="img-responsive img-fluid" src="images/courses/1.jpg" alt="1.jpg"></div>
                    <div class="irs-course-details">
                      <ul class="list-inline">
                        <li class="irs-user"><a href="#"><span class="flaticon-people-1"></span> 321</a></li>
                        <li class="irs-ccomment"><a href="#"><span class="flaticon-interface"></span> 4</a></li>
                        <li class="irs-course-price"><a href="#" class="text-thm2"><span class=""></span> $59.00</a></li>
                      </ul>
                      <h3><a href="#">Numerical scientific skills</a></h3>
                      <div class="irs-student-info">
                        <div class="irs-studend-thumb"> <img src="images/resource/student1.png" alt="student1.png"> </div>
                        <div class="irs-student-name"><a href="">with <span class="text-thm2">Jessica Hamson</span></a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 irs-ext-pad animatedParent">
                  <div class="irs-courses-fstcol animated fadeIn delay-500">
                    <div class="irs-course-thumb"><img class="img-responsive img-fluid" src="images/courses/2.jpg" alt="2.jpg"></div>
                    <div class="irs-course-details">
                      <ul class="list-inline">
                        <li class="irs-user"><a href="#"><span class="flaticon-people-1"></span> 321</a></li>
                        <li class="irs-ccomment"><a href="#"><span class="flaticon-interface"></span> 4</a></li>
                        <li class="irs-course-price"><a href="#" class="text-thm2"><span class=""></span> Free</a></li>
                      </ul>
                      <h3><a href="#">Computer Science and Philosophy</a></h3>
                      <div class="irs-student-info">
                        <div class="irs-studend-thumb"> <img src="images/resource/student2.png" alt="student2.png"> </div>
                        <div class="irs-student-name"><a href="">with <span class="text-thm2">Jessica Hamson</span></a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 irs-ext-pad animatedParent">
                  <div class="irs-courses-fstcol animated fadeIn delay-750">
                    <div class="irs-course-thumb"><img class="img-responsive img-fluid" src="images/courses/3.jpg" alt="3.jpg"></div>
                    <div class="irs-course-details">
                      <ul class="list-inline">
                        <li class="irs-user"><a href="#"><span class="flaticon-people-1"></span> 321</a></li>
                        <li class="irs-ccomment"><a href="#"><span class="flaticon-interface"></span> 4</a></li>
                        <li class="irs-course-price"><a href="#" class="text-thm2"><span class=""></span> $49.00</a></li>
                      </ul>
                      <h3><a href="#">Health and Medical Sciences</a></h3>
                      <div class="irs-student-info">
                        <div class="irs-studend-thumb"> <img src="images/resource/student3.png" alt="student3.png"> </div>
                        <div class="irs-student-name"><a href="">with <span class="text-thm2">Jessica Hamson</span></a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 irs-ext-pad animatedParent">
                  <div class="irs-courses-fstcol animated fadeIn delay-1000">
                    <div class="irs-course-thumb"><img class="img-responsive img-fluid" src="images/courses/4.jpg" alt="4.jpg"></div>
                    <div class="irs-course-details">
                      <ul class="list-inline">
                        <li class="irs-user"><a href="#"><span class="flaticon-people-1"></span> 321</a></li>
                        <li class="irs-ccomment"><a href="#"><span class="flaticon-interface"></span> 4</a></li>
                        <li class="irs-course-price"><a href="#" class="text-thm2"><span class=""></span> $25.00</a></li>
                      </ul>
                      <h3><a href="#">Plant and Microbial Biology</a></h3>
                      <div class="irs-student-info">
                        <div class="irs-studend-thumb"> <img src="images/resource/student4.png" alt="student4.png"> </div>
                        <div class="irs-student-name"><a href="">with <span class="text-thm2">Jessica Hamson</span></a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="messages">
                <div class="col-xs-12 col-sm-6 col-md-3 irs-ext-pad animatedParent">
                  <div class="irs-courses-fstcol animated fadeIn delay-250">
                    <div class="irs-course-thumb"><img class="img-responsive img-fluid" src="images/courses/1.jpg" alt="1.jpg"></div>
                    <div class="irs-course-details">
                      <ul class="list-inline">
                        <li class="irs-user"><a href="#"><span class="flaticon-people-1"></span> 321</a></li>
                        <li class="irs-ccomment"><a href="#"><span class="flaticon-interface"></span> 4</a></li>
                        <li class="irs-course-price"><a href="#" class="text-thm2"><span class=""></span> $59.00</a></li>
                      </ul>
                      <h3><a href="#">Numerical scientific skills</a></h3>
                      <div class="irs-student-info">
                        <div class="irs-studend-thumb"> <img src="images/resource/student1.png" alt="student1.png"> </div>
                        <div class="irs-student-name"><a href="">with <span class="text-thm2">Jessica Hamson</span></a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 irs-ext-pad animatedParent">
                  <div class="irs-courses-fstcol animated fadeIn delay-500">
                    <div class="irs-course-thumb"><img class="img-responsive img-fluid" src="images/courses/2.jpg" alt="2.jpg"></div>
                    <div class="irs-course-details">
                      <ul class="list-inline">
                        <li class="irs-user"><a href="#"><span class="flaticon-people-1"></span> 321</a></li>
                        <li class="irs-ccomment"><a href="#"><span class="flaticon-interface"></span> 4</a></li>
                        <li class="irs-course-price"><a href="#" class="text-thm2"><span class=""></span> Free</a></li>
                      </ul>
                      <h3><a href="#">Computer Science and Philosophy</a></h3>
                      <div class="irs-student-info">
                        <div class="irs-studend-thumb"> <img src="images/resource/student2.png" alt="student2.png"> </div>
                        <div class="irs-student-name"><a href="">with <span class="text-thm2">Jessica Hamson</span></a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 irs-ext-pad animatedParent">
                  <div class="irs-courses-fstcol animated fadeIn delay-750">
                    <div class="irs-course-thumb"><img class="img-responsive img-fluid" src="images/courses/3.jpg" alt="3.jpg"></div>
                    <div class="irs-course-details">
                      <ul class="list-inline">
                        <li class="irs-user"><a href="#"><span class="flaticon-people-1"></span> 321</a></li>
                        <li class="irs-ccomment"><a href="#"><span class="flaticon-interface"></span> 4</a></li>
                        <li class="irs-course-price"><a href="#" class="text-thm2"><span class=""></span> $49.00</a></li>
                      </ul>
                      <h3><a href="#">Health and Medical Sciences</a></h3>
                      <div class="irs-student-info">
                        <div class="irs-studend-thumb"> <img src="images/resource/student3.png" alt="student3.png"> </div>
                        <div class="irs-student-name"><a href="">with <span class="text-thm2">Jessica Hamson</span></a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 irs-ext-pad animatedParent">
                  <div class="irs-courses-fstcol animated fadeIn delay-1000">
                    <div class="irs-course-thumb"><img class="img-responsive img-fluid" src="images/courses/4.jpg" alt="4.jpg"></div>
                    <div class="irs-course-details">
                      <ul class="list-inline">
                        <li class="irs-user"><a href="#"><span class="flaticon-people-1"></span> 321</a></li>
                        <li class="irs-ccomment"><a href="#"><span class="flaticon-interface"></span> 4</a></li>
                        <li class="irs-course-price"><a href="#" class="text-thm2"><span class=""></span> $25.00</a></li>
                      </ul>
                      <h3><a href="#">Plant and Microbial Biology</a></h3>
                      <div class="irs-student-info">
                        <div class="irs-studend-thumb"> <img src="images/resource/student4.png" alt="student4.png"> </div>
                        <div class="irs-student-name"><a href="">with <span class="text-thm2">Jessica Hamson</span></a></div>
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
  
  <!-- Education Commitment Section -->
  <section class="irs-commitment-one">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
          <div class="irs-commitment-title text-center">
            <h2>Commitment to Education</h2>
            <img class="img-responsive" src="images/resource/commitment-title-img.png" alt="commitment-title-img.png"> </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="animatedParent">
            <div class="irs-commtmnt-column style_one text-left animated growIn delay-250">
              <div class="irs-cmmt-icon"><span class="flaticon-clothes"></span></div>
              <div class="irs-cmmt-details">
                <h3>Four Year Graduation Guarantee</h3>
                <p>By enrolling in the Four Bear Program, we guarantee you will graduate in four years with a bachelor’s degree.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="animatedParent">
            <div class="irs-commtmnt-column2 text-right animated growIn delay-250">
              <div class="irs-cmmt-icon"><span class="flaticon-signs"></span></div>
              <div class="irs-cmmt-details2">
                <h3>Best Value</h3>
                <p>A top 100 university based on research, service and social mobility, according to Washington Monthly.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="animatedParent">
            <div class="irs-commtmnt-column text-left animated growIn delay-500">
              <div class="irs-cmmt-icon"><span class="flaticon-school"></span></div>
              <div class="irs-cmmt-details">
                <h3>Small Class Sizes</h3>
                <p>76% of all undergraduate classes have fewer than 30 students so there´s plenty of room for everyone.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="animatedParent">
            <div class="irs-commtmnt-column2 text-right animated growIn delay-500">
              <div class="irs-cmmt-icon"><span class="flaticon-art"></span></div>
              <div class="irs-cmmt-details2">
                <h3>Extraordinary Faculty</h3>
                <p>World-renowned researchers provide personal attention, with a 19:1 student-to-faculty ratio.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Register Section -->
  <section class="irs-register">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-7">
          <div class="irs-register-counter">
            <h1 class="fz-extre-lagre">Learn outside of the classroom</h1>
            <p>You can work in labs on and off campus or in the wild of Montana, or even <br>
              spend semesters overseas.</p>
            <div class="irs-flip-clock">
              <div class="clock" style="margin:2em;"></div>
              <div class="message"></div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-5 text-center irs-padzero">
          <div class="irs-register-form text-center">
            <div class="irs-form-header"> <span class="irs-re-icon fz-extre-lagre flaticon-pencil"></span>
              <h3>Register today & get some classes directly on your email!</h3>
            </div>
            <div class="irs-form">
              <form>
                <div class="form-group">
                  <input class="form-control" id="name" placeholder="Your Name">
                </div>
                <div class="form-group">
                  <input class="form-control" id="email2" placeholder="diadea3007@hotmail.es">
                </div>
                <div class="form-group">
                  <input class="form-control" id="phone" placeholder="Your Phone">
                </div>
                <button class="btn btn-default irs-button-styledark">Register Today</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Event Section -->
  <section class="irs-event">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 col-md-8 col-lg-3 col-lg-offset-1">
          <div class="irs-econtent-details">
            <div class="irs-event-title">
              <h2>Our Edu Hub Events</h2>
            </div>
            <div class="irs-epara">
              <p>Events listed here are open to everyone. Whether you want to listen to a lecture, learn a new skill, take in a concert or an exhibition, see a play staged by our university students or attend one of our sporting events.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-8">
          <div class="irs-event-carousel">
            <div class="item">
              <div class="irs-event-grid">
                <div class="irs-evnt-thumb"><img class="img-responsive img-fluid" src="images/event/1.jpg" alt="1.jpg"></div>
                <div class="irs-edetails irs-ext-pad2">
                  <div class="irs-ettl">
                    <h4>Music in the University Lunch time Concert</h4>
                  </div>
                  <div class="irs-edate-time">
                    <ul class="list-unstyled">
                      <li><a href="#"><span class="flaticon-clock text-thm2"></span> Date: Thu, 19 Feb 2017 </a></li>
                      <li><a href="#"><span class="flaticon-clock-1 text-thm2"></span> Time: 13:10 - 14:00 </a></li>
                      <li><a href="#"><span class="flaticon-buildings text-thm2"></span> Venue: Hall B </a></li>
                    </ul>
                    <div class="irs-evnticon"><span class="flaticon-cross"></span></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="irs-event-grid">
                <div class="irs-edetails irs-ext-pad">
                  <div class="irs-ettl">
                    <h4>War and Medicine- Lunchtime Talks Series</h4>
                  </div>
                  <div class="irs-edate-time">
                    <ul class="list-unstyled">
                      <li><a href="#"><span class="flaticon-clock text-thm2"></span> Date: Thu, 19 Feb 2017 </a></li>
                      <li><a href="#"><span class="flaticon-clock-1 text-thm2"></span> Time: 13:10 - 14:00 </a></li>
                      <li><a href="#"><span class="flaticon-buildings text-thm2"></span> Venue: Hall B </a></li>
                    </ul>
                    <p>On the last Friday of every month at lunchtime (13.00) there will be a series of talks examining the effect of the First World War on medicine. </p>
                    <div class="irs-evnticon"><span class="flaticon-cross"></span></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="irs-event-grid">
                <div class="irs-evnt-thumb"><img class="img-responsive img-fluid" src="images/event/2.jpg" alt="2.jpg"></div>
                <div class="irs-edetails irs-ext-pad2">
                  <div class="irs-ettl">
                    <h4>EU copyright reform: the case for a related right for press </h4>
                  </div>
                  <div class="irs-edate-time">
                    <ul class="list-unstyled">
                      <li><a href="#"><span class="flaticon-clock text-thm2"></span> Date: Thu, 14 Feb 2017 </a></li>
                      <li><a href="#"><span class="flaticon-clock-1 text-thm2"></span> Time: 13:10 - 14:00 </a></li>
                      <li><a href="#"><span class="flaticon-buildings text-thm2"></span> Venue: Hall A </a></li>
                    </ul>
                    <div class="irs-evnticon"><span class="flaticon-cross"></span></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="irs-event-grid">
                <div class="irs-evnt-thumb"><img class="img-responsive img-fluid" src="images/event/1.jpg" alt="1.jpg"></div>
                <div class="irs-edetails irs-ext-pad2">
                  <div class="irs-ettl">
                    <h4>Music in the University Lunch time Concert</h4>
                  </div>
                  <div class="irs-edate-time">
                    <ul class="list-unstyled">
                      <li><a href="#"><span class="flaticon-clock text-thm2"></span> Date: Thu, 19 Feb 2017 </a></li>
                      <li><a href="#"><span class="flaticon-clock-1 text-thm2"></span> Time: 13:10 - 14:00 </a></li>
                      <li><a href="#"><span class="flaticon-buildings text-thm2"></span> Venue: Hall B </a></li>
                    </ul>
                    <div class="irs-evnticon"><span class="flaticon-cross"></span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Campus Section -->
  <section class="irs-campus">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
          <div class="irs-campus-title text-center">
            <h2>Campus Videos</h2>
            <img class="img-responsive" src="images/resource/commitment-title-img.png" alt="commitment-title-img.png"> </div>
        </div>
      </div>
      <div class="row irs-mrgnt">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5"> 
          <!-- Swiper -->
          <div class="swiper-container">
            <div class="swiper-wrapper">
              <div class="irs-ss-item swiper-slide">
                <div class="irs-campus-thumb"> <img class="img-responsive img-fluid" src="images/campus/1.jpg" alt="">
                  <div class="irs-campus-overlayer"><a title="Studying at the University of Luxembourg" class="popup-youtube" href="https://www.youtube.com/watch?v=hYEnh4LuruQ"><span class="flaticon-play-1"></span></a></div>
                  <p>Details On Hover Title</p>
                </div>
              </div>
              <div class="irs-ss-item swiper-slide">
                <div class="irs-campus-thumb"> <img class="img-responsive img-fluid" src="images/campus/3.jpg" alt="">
                  <div class="irs-campus-overlayer"><a title="Taking a new approach to develop anti-fraud" class="popup-youtube" href="https://www.youtube.com/watch?v=hYEnh4LuruQ"><span class="flaticon-play-1"></span></a></div>
                  <p>Details On Hover Title</p>
                </div>
              </div>
              <div class="irs-ss-item swiper-slide">
                <div class="irs-campus-thumb"> <img class="img-responsive img-fluid" src="images/campus/2.jpg" alt="">
                  <div class="irs-campus-overlayer"><a title="Taking a new Physicists and Computer Scientists " class="popup-youtube" href="https://www.youtube.com/watch?v=hYEnh4LuruQ"><span class="flaticon-play-1"></span></a></div>
                  <p>Details On Hover Title</p>
                </div>
              </div>
              <div class="irs-ss-item swiper-slide">
                <div class="irs-campus-thumb"> <img class="img-responsive img-fluid" src="images/campus/4.jpg" alt="">
                  <div class="irs-campus-overlayer"><a title="Their idea is to use liquid crystals to produce" class="popup-youtube" href="https://www.youtube.com/watch?v=hYEnh4LuruQ"><span class="flaticon-play-1"></span></a></div>
                  <p>Details On Hover Title</p>
                </div>
              </div>
              <div class="irs-ss-item swiper-slide">
                <div class="irs-campus-thumb"> <img class="img-responsive img-fluid" src="images/campus/1.jpg" alt="">
                  <div class="irs-campus-overlayer"><a title="Studying at the University of Luxembourg" class="popup-youtube" href="https://www.youtube.com/watch?v=hYEnh4LuruQ"><span class="flaticon-play-1"></span></a></div>
                  <p>Details On Hover Title</p>
                </div>
              </div>
              <div class="irs-ss-item swiper-slide">
                <div class="irs-campus-thumb"> <img class="img-responsive img-fluid" src="images/campus/2.jpg" alt="">
                  <div class="irs-campus-overlayer"><a title="Taking a new Physicists and Computer Scientists" class="popup-youtube" href="https://www.youtube.com/watch?v=hYEnh4LuruQ"><span class="flaticon-play-1"></span></a></div>
                  <p>Details On Hover Title</p>
                </div>
              </div>
              <div class="irs-ss-item swiper-slide">
                <div class="irs-campus-thumb"> <img class="img-responsive img-fluid" src="images/campus/3.jpg" alt="">
                  <div class="irs-campus-overlayer"><a title="Taking a new approach to develop anti-fraud" class="popup-youtube" href="https://www.youtube.com/watch?v=hYEnh4LuruQ"><span class="flaticon-play-1"></span></a></div>
                  <p>Details On Hover Title</p>
                </div>
              </div>
              <div class="irs-ss-item swiper-slide">
                <div class="irs-campus-thumb"> <img class="img-responsive img-fluid" src="images/campus/4.jpg" alt="">
                  <div class="irs-campus-overlayer"><a title="Their idea is to use liquid crystals to produce" class="popup-youtube" href="https://www.youtube.com/watch?v=hYEnh4LuruQ"><span class="flaticon-play-1"></span></a></div>
                  <p>Details On Hover Title</p>
                </div>
              </div>
            </div>
            <!-- Add Pagination -->
            <div class="irs-campus-ss swiper-pagination"></div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-7 irs-pad-zero">
          <div class="irs-campus-thumb2">
            <iframe width="670" height="380" src="http://www.youtube.com/embed/PvXZKSumtk8?autoplay=0" allowfullscreen=""></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Pricing Section -->
  <section class="irs-pricing">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
          <h2 class="irs-color-white">Dorm Pricing Rates</h2>
          <img class="img-responsive" src="images/resource/pricing-title-img.png" alt="pricing-title-img.png"> </div>
      </div>
      <div class="row irs-mrgnt">
        <div class="col-md-4 irs-pad-zero animatedParent">
          <div class="irs-pricing-table style1 text-center animated growIn delay-500">
            <div class="irs-pricing-header">
              <div class="irs-pricing-icon"><span class="flaticon-interface-5"></span></div>
              <ul class="list-inline irs-price-area">
                <li class="irs-pricing-title">Primary Bedroom </li>
                <li class="irs-price">$199 / month</li>
              </ul>
            </div>
            <div class="irs-pricing-footer">
              <ul class="list-unstyled">
                <li>Plush Bedding</li>
                <li>Stylish Bathrooms</li>
                <li>Flexible Workspaces</li>
                <li>Free Wi-Fi</li>
                <li><del>King & Queen sized rooms</del></li>
              </ul>
              <div class="btn btn-default irs-pricing-btn"><span class="flaticon-arrows-2"></span> Select This</div>
            </div>
          </div>
        </div>
        <div class="col-md-4 irs-pad-zero animatedParent">
          <div class="irs-pricing-table style2 text-center animated growIn delay-500">
            <div class="irs-pricing-header">
              <div class="irs-pricing-icon"><span class="flaticon-interface-4"></span></div>
              <ul class="list-inline irs-price-area">
                <li class="irs-pricing-title">Primary Bedroom </li>
                <li class="irs-price">$199 / month</li>
              </ul>
            </div>
            <div class="irs-pricing-footer">
              <ul class="list-unstyled">
                <li>Plush Bedding</li>
                <li>Stylish Bathrooms</li>
                <li>Flexible Workspaces</li>
                <li>Free Wi-Fi</li>
                <li><del>King & Queen sized rooms</del></li>
              </ul>
              <div class="btn btn-default irs-pricing-btn"><span class="flaticon-arrows-2"></span> Select This</div>
            </div>
          </div>
        </div>
        <div class="col-md-4 irs-pad-zero animatedParent">
          <div class="irs-pricing-table style3 text-center animated growIn delay-500">
            <div class="irs-pricing-header">
              <div class="irs-pricing-icon"><span class="flaticon-interface-2"></span></div>
              <div class="irs-pricing-tag">
                <p>Best <br>
                  Plan</p>
              </div>
              <ul class="list-inline irs-price-area">
                <li class="irs-pricing-title">Primary Bedroom </li>
                <li class="irs-price">$199 / month</li>
              </ul>
            </div>
            <div class="irs-pricing-footer">
              <ul class="list-unstyled">
                <li>Plush Bedding</li>
                <li>Stylish Bathrooms</li>
                <li>Flexible Workspaces</li>
                <li>Free Wi-Fi</li>
                <li>King & Queen sized rooms</li>
              </ul>
              <div class="btn btn-default irs-pricing-btn"><span class="flaticon-arrows-2"></span> Select This</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Blog Section -->
  <section class="irs-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
          <h2>Edu Hub News</h2>
          <img class="img-responsive" src="images/resource/commitment-title-img.png" alt="commitment-title-img.png"> </div>
      </div>
      <div class="row irs-mrgnt">
        <div class="col-md-12">
          <div class="irs-blog-slider">
            <div class="item">
              <div class="irs-blog-post">
                <div class="irs-bp-thumb"> <img class="img-responsive img-fluid" src="images/blog/1.jpg" alt="blog/1.jpg"> </div>
                <div class="irs-bp-details">
                  <ul class="list-inline irs-bp-ustudent">
                    <li><a href="#"> University </a></li>
                    <li><a href="#"> / </a></li>
                    <li><a href="#"> Students </a></li>
                  </ul>
                  <h3 class="irs-bp-title">Students recreate 5,000-year-old Chinese beer recipe</h3>
                  <div class="irs-bp-meta">
                    <ul class="list-inline irs-bp-meta-dttime">
                      <li>by <span class="text-thm1"> Dennis C.</span> </li>
                      <li><span class="flaticon-clock-1"></span> 9 Feb, 2017 </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="irs-blog-post">
                <div class="irs-bp-thumb"> <img class="img-responsive img-fluid" src="images/blog/2.jpg" alt="blog/2.jpg"> </div>
                <div class="irs-bp-details">
                  <ul class="list-inline irs-bp-ustudent">
                    <li><a href="#"> College </a></li>
                    <li><a href="#"> / </a></li>
                    <li><a href="#"> Business </a></li>
                  </ul>
                  <h3 class="irs-bp-title">U.S. Supreme Court Justice Ruth Bader Ginsburg talks </h3>
                  <div class="irs-bp-meta">
                    <ul class="list-inline irs-bp-meta-dttime">
                      <li>by <span class="text-thm1"> Dennis C.</span> </li>
                      <li><span class="flaticon-clock-1"></span> 9 Feb, 2017 </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="irs-blog-post">
                <div class="irs-bp-thumb"> <img class="img-responsive img-fluid" src="images/blog/3.jpg" alt="blog/3.jpg"> </div>
                <div class="irs-bp-details">
                  <ul class="list-inline irs-bp-ustudent">
                    <li><a href="#"> Activities </a></li>
                    <li><a href="#"> / </a></li>
                    <li><a href="#"> Students </a></li>
                    <li><a href="#"> / </a></li>
                    <li><a href="#"> Alumni </a></li>
                  </ul>
                  <h3 class="irs-bp-title">Engineers create lowcost battery for storing renewable</h3>
                  <div class="irs-bp-meta">
                    <ul class="list-inline irs-bp-meta-dttime">
                      <li>by <span class="text-thm1"> Dennis C.</span> </li>
                      <li><span class="flaticon-clock-1"></span> 9 Feb, 2017 </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="irs-blog-post">
                <div class="irs-bp-thumb"> <img class="img-responsive img-fluid" src="images/blog/2.jpg" alt="blog/2.jpg"> </div>
                <div class="irs-bp-details">
                  <ul class="list-inline irs-bp-ustudent">
                    <li><a href="#"> College </a></li>
                    <li><a href="#"> / </a></li>
                    <li><a href="#"> Business </a></li>
                  </ul>
                  <h3 class="irs-bp-title">U.S. Supreme Court Justice Ruth Bader Ginsburg talks</h3>
                  <div class="irs-bp-meta">
                    <ul class="list-inline irs-bp-meta-dttime">
                      <li>by <span class="text-thm1"> Dennis C.</span> </li>
                      <li><span class="flaticon-clock-1"></span> 9 Feb, 2017 </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="irs-blog-post">
                <div class="irs-bp-thumb"> <img class="img-responsive img-fluid" src="images/blog/1.jpg" alt="blog/1.jpg"> </div>
                <div class="irs-bp-details">
                  <ul class="list-inline irs-bp-ustudent">
                    <li><a href="#"> University </a></li>
                    <li><a href="#"> / </a></li>
                    <li><a href="#"> Students </a></li>
                  </ul>
                  <h3 class="irs-bp-title">Students recreate 5,000-year-old Chinese beer recipe</h3>
                  <div class="irs-bp-meta">
                    <ul class="list-inline irs-bp-meta-dttime">
                      <li>by <span class="text-thm1"> Dennis C.</span> </li>
                      <li><span class="flaticon-clock-1"></span> 9 Feb, 2017 </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="irs-blog-post">
                <div class="irs-bp-thumb"> <img class="img-responsive img-fluid" src="images/blog/2.jpg" alt="blog/2.jpg"> </div>
                <div class="irs-bp-details">
                  <ul class="list-inline irs-bp-ustudent">
                    <li><a href="#"> College </a></li>
                    <li><a href="#"> / </a></li>
                    <li><a href="#"> Business </a></li>
                  </ul>
                  <h3 class="irs-bp-title">U.S. Supreme Court Justice Ruth Bader Ginsburg talks </h3>
                  <div class="irs-bp-meta">
                    <ul class="list-inline irs-bp-meta-dttime">
                      <li>by <span class="text-thm1"> Dennis C.</span> </li>
                      <li><span class="flaticon-clock-1"></span> 9 Feb, 2017 </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="irs-blog-post">
                <div class="irs-bp-thumb"> <img class="img-responsive img-fluid" src="images/blog/3.jpg" alt="blog/3.jpg"> </div>
                <div class="irs-bp-details">
                  <ul class="list-inline irs-bp-ustudent">
                    <li><a href="#"> Activities </a></li>
                    <li><a href="#"> / </a></li>
                    <li><a href="#"> Students </a></li>
                    <li><a href="#"> / </a></li>
                    <li><a href="#"> Alumni </a></li>
                  </ul>
                  <h3 class="irs-bp-title">Engineers create lowcost battery for storing renewable</h3>
                  <div class="irs-bp-meta">
                    <ul class="list-inline irs-bp-meta-dttime">
                      <li>by <span class="text-thm1"> Dennis C.</span> </li>
                      <li><span class="flaticon-clock-1"></span> 9 Feb, 2017 </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="irs-blog-post">
                <div class="irs-bp-thumb"> <img class="img-responsive img-fluid" src="images/blog/2.jpg" alt="blog/2.jpg"> </div>
                <div class="irs-bp-details">
                  <ul class="list-inline irs-bp-ustudent">
                    <li><a href="#"> College </a></li>
                    <li><a href="#"> / </a></li>
                    <li><a href="#"> Business </a></li>
                  </ul>
                  <h3 class="irs-bp-title">U.S. Supreme Court Justice Ruth Bader Ginsburg talks</h3>
                  <div class="irs-bp-meta">
                    <ul class="list-inline irs-bp-meta-dttime">
                      <li>by <span class="text-thm1"> Dennis C.</span> </li>
                      <li><span class="flaticon-clock-1"></span> 9 Feb, 2017 </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="irs-blog-post">
                <div class="irs-bp-thumb"> <img class="img-responsive img-fluid" src="images/blog/3.jpg" alt="blog/3.jpg"> </div>
                <div class="irs-bp-details">
                  <ul class="list-inline irs-bp-ustudent">
                    <li><a href="#"> Activities </a></li>
                    <li><a href="#"> / </a></li>
                    <li><a href="#"> Students </a></li>
                    <li><a href="#"> / </a></li>
                    <li><a href="#"> Alumni </a></li>
                  </ul>
                  <h3 class="irs-bp-title">Engineers create lowcost battery for storing renewable</h3>
                  <div class="irs-bp-meta">
                    <ul class="list-inline irs-bp-meta-dttime">
                      <li>by <span class="text-thm1"> Dennis C.</span> </li>
                      <li><span class="flaticon-clock-1"></span> 9 Feb, 2017 </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="irs-blog-post">
                <div class="irs-bp-thumb"> <img class="img-responsive img-fluid" src="images/blog/2.jpg" alt="blog/2.jpg"> </div>
                <div class="irs-bp-details">
                  <ul class="list-inline irs-bp-ustudent">
                    <li><a href="#"> College </a></li>
                    <li><a href="#"> / </a></li>
                    <li><a href="#"> Business </a></li>
                  </ul>
                  <h3 class="irs-bp-title">U.S. Supreme Court Justice Ruth Bader Ginsburg talks</h3>
                  <div class="irs-bp-meta">
                    <ul class="list-inline irs-bp-meta-dttime">
                      <li>by <span class="text-thm1"> Dennis C.</span> </li>
                      <li><span class="flaticon-clock-1"></span> 9 Feb, 2017 </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Testimonials Section -->
  <section class="irs-testimonial">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-7 irs-pad-zero">
          <div class="row">
            <div class="col-md-12 animatedParent">
              <div class="irs-testimonial-grid text-left animated growIn delay-250">
                <div class="irs-testi-quote">
                  <p> “ </p>
                </div>
                <div class="irs-testimonial-thumb"><img src="images/resource/testi1.jpg" alt="testi1.jpg"></div>
                <div class="irs-tm-details">
                  <h4>Jaqueline Smith</h4>
                  <h5 class="text-thm2">BA Hons Business Management</h5>
                  <p>“The lectures & tutorials are interesting academically stimulating, and applied to real-world case studies which is extremely useful.”</p>
                </div>
              </div>
            </div>
            <div class="col-md-12 animatedParent">
              <div class="irs-testimonial-grid2 text-right animated growIn delay-500">
                <div class="irs-testi-quote">
                  <p> “ </p>
                </div>
                <div class="irs-testimonial-thumb2"><img src="images/resource/testi2.jpg" alt="testi2.jpg"></div>
                <div class="irs-tm-details2">
                  <h4>Jaqueline Smith</h4>
                  <h5 class="text-thm2">BA Hons Business Management</h5>
                  <p>“The lectures & tutorials are interesting academically stimulating, and applied to real-world case studies which is extremely useful.”</p>
                </div>
              </div>
            </div>
            <div class="col-md-12 animatedParent">
              <div class="irs-testimonial-grid3 text-left animated growIn delay-750">
                <div class="irs-testi-quote">
                  <p> “ </p>
                </div>
                <div class="irs-testimonial-thumb3"><img src="images/resource/testi3.jpg" alt="testi3.jpg"></div>
                <div class="irs-tm-details3">
                  <h4>Jaqueline Smith</h4>
                  <h5 class="text-thm2">BA Hons Business Management</h5>
                  <p>“The lectures & tutorials are interesting academically stimulating, and applied to real-world case studies which is extremely useful.”</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-lg-offser-1 animatedParent">
          <div class="irs-tm-description animated growIn delay-1000">
            <h2 class="irs-tm-title">Our Happy Students</h2>
            <p>Our alumni are very content with our classes and 99% of them managed to find a job in their field. Check out our full testimonials from our best students worldwide.</p>
            <a href="#" class="btn btn-default irs-tm-qbtn irs-btn-thm"><span> Check our FAQ’s</span></a> </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Clients Section -->
  <section class="irs-client">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
          <div class="irs-clients-title">
            <h2>Our Alumni Work For</h2>
          </div>
          <img class="img-responsive" src="images/resource/commitment-title-img.png" alt="commitment-title-img.png"> 
        </div>
      </div>
      <div class="row irs-mrgnt">
        <div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 clearfix animatedParent">
          <div class="irs-clients-thumb text-center animated growIn"><img class="img-responsive" src="images/clients/2.png" alt="2.png"></div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 clearfix animatedParent">
          <div class="irs-clients-thumb text-center animated growIn"><img class="img-responsive" src="images/clients/3.png" alt="3.png"></div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 clearfix animatedParent">
          <div class="irs-clients-thumb text-center animated growIn"><img class="img-responsive" src="images/clients/1.png" alt="4.png"></div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 clearfix animatedParent">
          <div class="irs-clients-thumb text-center animated growIn"><img class="img-responsive" src="images/clients/4.png" alt="5.png"></div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 clearfix animatedParent">
          <div class="irs-clients-thumb text-center animated growIn"><img class="img-responsive" src="images/clients/5.png" alt="6.png"></div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 clearfix animatedParent">
          <div class="irs-clients-thumb text-center animated growIn"><img class="img-responsive" src="images/clients/6.png" alt="1.png"></div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Newsletter Section -->
  <section class="irs-newsletter-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
          <h2>Get our Edu Hub latest courses & promos on your email:</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="irs-nl-form">
            <form>
              <div class="form-group">
                <input class="form-control" id="email3" placeholder="Your Email Address">
                <button type="submit" class="btn btn-default pull-right"><span class="flaticon-note"></span></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
@section('script')
  <script>
    var swiper = new Swiper('.swiper-container', {
      pagination: '.swiper-pagination',
      slidesPerView: 2,
      slidesPerColumn: 2,
      paginationClickable: true,
      spaceBetween: 20,
      mousewheelControl: true
    });
  </script>
@endsection