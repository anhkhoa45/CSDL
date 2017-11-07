@extends('layouts.main')

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
                    <li class="irs-cl-thumb"><img src="{{ asset('images/courses/s4.png') }}" alt="s4.png"></li>
                    <li class="irs-cl-info">with <span class="text-thm2"> {{ $course->teacher->name }}</span></li>
                    <li> <span class="text-thm2 flaticon-social-2"></span> {{ $course->buyers->count() }}</li>
                    <li> <span class="text-thm2 flaticon-interface-1"></span> 10</li>
                    <li> <span class="text-thm2 flaticon-folder"></span> Languages / Foreign</li>
                    <li class="pull-right"> <a href="#" class="btn btn-default irs-button-styledark"> Take This Course</a></li>
                  </ul>
              </div>
              <div class="irs-courses-details-thumb">
                <img class="img-responsive img-fluid" src="{{ asset('images/courses/cd1.jpg') }}" alt="cd1.jpg">
                <div class="irs-cdtls-price"><p>${{ $course->cost }}</p></div>
              </div>              
            </div>
          </div>
          <div class="row irs-mrngtp-svnty">
            <div class="col-lg-12">
              <div class="irs-courses-details">
                <div class="irs-cdetails-tab">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a></li>
                    <li role="presentation"><a href="#curriculum" aria-controls="curriculum" role="tab" data-toggle="tab">Curriculum</a></li>
                    <li role="presentation"><a href="#teachers" aria-controls="teachers" role="tab" data-toggle="tab">Teachers</a></li>
                    <li role="presentation"><a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">Comments</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="description">
                      <div class="row">
                        <div class="col-md-5">
                          <div class="irs-cdtls-feture-bot">
                            <ul class="list-group">
                              <li>
                                <a class="list-group-item" href="#"><span class="flaticon-business text-thm2"></span> Lecture <span class="pull-right"> {{ $course->videos->count() }} </span></a>
                              </li>
                              <li>
                                <a class="list-group-item" href="#"><span class="flaticon-pen text-thm2"></span> Project <span class="pull-right"> {{ $course->projects->count() }} </span></a>
                              </li>
                              <li>
                                <a class="list-group-item" href="#"><span class="flaticon-people-1 text-thm2"></span> Students <span class="pull-right"> {{ $course->buyers->count() }} </span></a>
                              </li>
                              <li>
                                <a class="list-group-item irs-bbn" href="#"><span class="flaticon-technology text-thm2"></span> Assessments <span class="pull-right"> self </span></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-md-7">
                          <div class="irs-courses-dtls-second-para">
                            <p>{{ $course->description }}</p>
                          </div>
                        </div>
                      </div>
                      <div class="row">

                        <div class="col-md-12">
                          <h1>Table of contents</h1>
                          <h3>Videos</h3>
                          <table class="table table-striped">

                            <tr>
                              <th>#</th>
                              <th>Video</th>
                            </tr>
                            @foreach($course->videos()->orderBy('order_in_course')->get() as $video)
                              <tr>
                                <td>{{ $video->order_in_course }}</td>
                                <td>{{ $video->name }}</td>
                              </tr>
                            @endforeach

                          </table>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <h3>Projects</h3>
                          <table class="table table-striped">

                            <tr>
                              <th>#</th>
                              <th>Project name</th>
                            </tr>
                            @foreach($course->projects as $project)
                              <tr>
                                <td>{{ $project->order_in_course }}</td>
                                <td>{{ $project->project_name }}</td>
                              </tr>
                            @endforeach

                          </table>
                        </div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="curriculum">
                      <div class="col-md-12">
                        <div class="irs-cdtls-feture-bot2">
                          <ul class="list-group">
                            <li>
                              <a class="list-group-item" href="#">
                                <ul class="list-inline">
                                  <li><span class="flaticon-business text-thm2"></span> Lecture 1.1 </li>
                                  <li><div class="its-tdu">Practical language work </div></li>
                                  <li><span class="btn btn-sm irs-btn-thm3"> See Course</span></li>
                                  <li class="pull-right"> 2 hrs. </li>
                                </ul>                                
                              </a>
                            </li>
                            <li>
                              <a class="list-group-item" href="#">
                                <ul class="list-inline">
                                  <li><span class="flaticon-business text-thm2"></span> Lecture 1.2 </li>
                                  <li><div class="its-tdu">Study of important works and/or topics </div></li>
                                  <li><span class="btn btn-sm irs-btn-thm3"> See Course</span></li>
                                  <li class="pull-right"> 1 hr. </li>
                                </ul>
                              </a>
                            </li>
                            <li>
                              <a class="list-group-item" href="#">
                                <ul class="list-inline">
                                  <li><span class="flaticon-tool text-thm2"></span> Lecture 1.3 </li>
                                  <li><div class="its-tdu">Literature of the language </div></li>
                                  <li><span class="btn btn-sm irs-btn-thm3"> See Course</span></li>
                                  <li class="pull-right"> 1.20 hrs. </li>
                                </ul>
                              </a>
                            </li>
                            <li>
                              <a class="list-group-item" href="#">
                                <ul class="list-inline">
                                  <li><span class="flaticon-business text-thm2"></span> Lecture 1.4 </li>
                                  <li><div class="its-tdu">General linguistics </div></li>
                                  <li><span class="btn btn-sm irs-btn-thm3"> See Course</span></li>
                                  <li class="pull-right"> 2 hrs. </li>
                                </ul>
                              </a>
                            </li>
                            <li>
                              <a class="list-group-item" href="#">
                                <ul class="list-inline">
                                  <li><span class="flaticon-business text-thm2"></span> Lecture 1.5 </li>
                                  <li><div class="its-tdu">Phonetics and phonology </div></li>
                                  <li><span class="btn btn-sm irs-btn-thm3"> See Course</span></li>
                                  <li class="pull-right"> 3 hrs. </li>
                                </ul>
                              </a>
                            </li>
                            <li>
                              <a class="list-group-item" href="#">
                                <ul class="list-inline">
                                  <li><span class="flaticon-business text-thm2"></span> Lecture 1.6 </li>
                                  <li><div class="its-tdu">Grammatical analysis </div></li>
                                  <li class="pull-right"> 1.30 hrs. </li>
                                </ul>
                              </a>
                            </li>
                            <li>
                              <a class="list-group-item irs-bbn" href="#">
                                <ul class="list-inline">
                                  <li><span class="flaticon-pen text-thm2"></span> Quizzes </li>
                                  <li><div class="its-tdu">History of the language test </div></li>
                                  <li class="pull-right"> 30 mins. </li>
                                </ul>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="teachers">
                      <div class="irs-course-sd-teacher">
                        <div class="row">
                          <div class="col-md-2 irs-mrgnbtm-sxty">
                            <div class="irs-courses-td-sngle">
                              <div class="irs-ctds-thumb">
                                <img class="img-responsive img-fluid" src="images/team/tsm1.png" alt="tsm1.png">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-10 irs-mrgnbtm-sxty irs-all-course-bb">
                            <div class="irs-courses-td-sngle-dtls">
                              <ul class="list-unstyled">
                                  <li class="irs-name-tdsd">Louise M. Ross</li>
                                  <li class="irs-psot-tdsd">History of Arts Teacher</li>
                              </ul>
                              <div class="irs-social-icon-td-sngle-dtls pull-right">
                                <ul class="list-inline irs-courses-tdetls">
                                  <li class="fbok"><a href="#"><span class="flaticon-social-3"></span> </a></li>
                                  <li class="twtr"><a href="#"><span class="flaticon-social-4"></span> </a></li>
                                  <li class="gplus"><a href="#"><span class="flaticon-social-media-1"></span> </a></li>
                                  <li class="linkdin"><a href="#"><span class="flaticon-linkedin-logo"></span> </a></li>
                                </ul>
                              </div>
                              <p>Your week’s work will include a tutorial on linguistics and one on literature, in or arranged by your college, a linguistics class and language classes on different skills relating to the language or languages you study, and five or six lectures.</p>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2 irs-mrgnbtm-sxty">
                            <div class="irs-courses-td-sngle">
                              <div class="irs-ctds-thumb">
                                <img class="img-responsive img-fluid" src="images/team/tsm2.png" alt="tsm2.png">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-10 irs-mrgnbtm-sxty irs-all-course-bb">
                            <div class="irs-courses-td-sngle-dtls">
                              <ul class="list-unstyled">
                                <li class="irs-name-tdsd">Miguel M. Ball</li>
                                <li class="irs-psot-tdsd">Physics and Philosophy Teacher</li>
                              </ul>
                              <div class="irs-social-icon-td-sngle-dtls pull-right">
                                <ul class="list-inline irs-courses-tdetls">
                                  <li class="fbok"><a href="#"><span class="flaticon-social-3"></span> </a></li>
                                  <li class="twtr"><a href="#"><span class="flaticon-social-4"></span> </a></li>
                                  <li class="gplus"><a href="#"><span class="flaticon-social-media-1"></span> </a></li>
                                  <li class="linkdin"><a href="#"><span class="flaticon-linkedin-logo"></span> </a></li>
                                </ul>
                              </div>
                              <p>Your week’s work will include a tutorial on linguistics and one on literature, in or arranged by your college, a linguistics class and language classes on different skills relating to the language or languages you study, and five or six lectures.</p>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2 irs-mrgnbtm-sxty">
                            <div class="irs-courses-td-sngle">
                              <div class="irs-ctds-thumb">
                                <img class="img-responsive img-fluid" src="images/team/tsm3.png" alt="tsm3.png">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-10 irs-mrgnbtm-sxty irs-all-course-bb">
                            <div class="irs-courses-td-sngle-dtls">
                              <ul class="list-unstyled">
                                  <li class="irs-name-tdsd">Rebecca J. Wagner</li>
                                  <li class="irs-psot-tdsd">Earth Sciences (Geology) Teacher</li>
                              </ul>
                              <div class="irs-social-icon-td-sngle-dtls pull-right">
                                <ul class="list-inline irs-courses-tdetls">
                                  <li class="fbok"><a href="#"><span class="flaticon-social-3"></span> </a></li>
                                  <li class="twtr"><a href="#"><span class="flaticon-social-4"></span> </a></li>
                                  <li class="gplus"><a href="#"><span class="flaticon-social-media-1"></span> </a></li>
                                  <li class="linkdin"><a href="#"><span class="flaticon-linkedin-logo"></span> </a></li>
                                </ul>
                              </div>
                              <p>Your week’s work will include a tutorial on linguistics and one on literature, in or arranged by your college, a linguistics class and language classes on different skills relating to the language or languages you study, and five or six lectures.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="comments">
                      <div class="irs-course-sd-teacher">
                        <div class="row">
                          <div class="col-md-2 irs-mrgnbtm-sxty">
                            <div class="irs-courses-td-sngle">
                              <div class="irs-ctds-thumb">
                                <img class="img-responsive img-fluid img-circle" src="images/team/tsm1.png" alt="tsm1.png">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-10 irs-mrgnbtm-sxty irs-all-course-bb">
                            <div class="irs-courses-td-sngle-dtls">
                              <ul class="list-unstyled">
                                  <li class="irs-psot-tdsd">Delicia Memphis</li>
                                  <li class="irs-name-tdsd">This course is so awesome</li>
                              </ul>
                              <p>Practical laboratory work is an integral part of teaching and there is a compulsory one-week field trip for all first-year students to Pembrokeshire to study ecology.</p>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2 irs-mrgnbtm-sxty">
                            <div class="irs-courses-td-sngle">
                              <div class="irs-ctds-thumb">
                                <img class="img-responsive img-fluid img-circle" src="images/team/tsm2.png" alt="tsm2.png">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-10 irs-mrgnbtm-sxty irs-all-course-bb">
                            <div class="irs-courses-td-sngle-dtls">
                              <ul class="list-unstyled">
                                <li class="irs-psot-tdsd">Wayne C. Trussell</li>
                                <li class="irs-name-tdsd">I strongly recommend this course</li>
                              </ul>
                              <p>After graduation, Jenny spent several years in a medical communication agency environment, and now has her own business, working directly with major global pharmaceutical companies. </p>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2 irs-mrgnbtm-sxty">
                            <div class="irs-courses-td-sngle">
                              <div class="irs-ctds-thumb">
                                <img class="img-responsive img-fluid img-circle" src="images/team/tsm3.png" alt="tsm3.png">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-10 irs-mrgnbtm-sxty irs-all-course-bb">
                            <div class="irs-courses-td-sngle-dtls">
                              <ul class="list-unstyled">
                                  <li class="irs-psot-tdsd">Patricia J. Norwood</li>
                                  <li class="irs-name-tdsd">It went out really great for me</li>
                              </ul>
                              <p>Hannah, now a research assistant at the Royal Veterinary College, reports: ‘My degree gave me a keen interest in my subject and the skills to pursue it. </p>
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


  <!-- Latest Course Section -->
  <section class="irs-latest-course">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 irs-pad-zero style2">
          <h2 class="irs-lc-title">Latest Courses</h2>
          <p class="irs-lc-tpara">Edu Hub offers lots of courses, of all types. Take a moment and see our latest ones:</p>
        </div>
        <div class="col-lg-6 irs-pad-zero style2 irs-all-courses text-right">
          <a href="#" class="btn btn-sm irs-btn-thm"><span> See All Courses</span></a>
        </div>
      </div>
      <div class="row irs-mrgnt">
        <div class="col-lg-12 irs-pad-zero">
          <div class="irs-lc-carousel">
            <div class="item animatedParent">
              <div class="irs-lc-grid text-center animated growIn delay-250">
                <div class="irs-lc-grid-thumb">
                  <img class="img-responsive img-fluid" src="images/courses/5.jpg" alt="5.jpg">
                  <div class="irs-lc-overlay"></div>
                  <div class="irs-lc-price">free</div>
                </div>
                <div class="irs-lc-details">
                  <div class="irs-lc-teacher-info">
                    <div class="irs-lct-thumb"><img src="images/courses/s3.png" alt="s3.png"></div>
                    <div class="irs-lct-info">with <span class="text-thm2"> Jessica Hamson</span></div>
                  </div>
                  <h4><a href="#">Applied Science and Best Technology (AST)</a></h4>
                </div>
                <div class="irs-lc-footer">
                  <div class="irs-lc-normal-part">
                    <ul class="list-inline">
                      <li><a href="#"><i class="fa fa-users"></i> 321</a></li>
                      <li><a href="#"><i class="fa fa-commenting"></i> 4</a></li>
                    </ul>
                  </div>
                  <div class="irs-lc-hover-part">See Course</div>
                </div>
              </div>
            </div>
            <div class="item animatedParent">
              <div class="irs-lc-grid text-center animated growIn delay-250">
                <div class="irs-lc-grid-thumb">
                  <img class="img-responsive img-fluid" src="images/courses/6.jpg" alt="6.jpg">
                  <div class="irs-lc-overlay"></div>
                  <div class="irs-lc-price">$35.99</div>
                </div>
                <div class="irs-lc-details style2">
                  <div class="irs-lc-teacher-info">
                    <div class="irs-lct-thumb"><img src="images/courses/s4.png" alt="s4.png"></div>
                    <div class="irs-lct-info">with <span class="text-thm2"> Annie Thornburg</span></div>
                  </div>
                  <h4 class="irs-extraspce"><a href="#">African American Studies (AFRICAM)</a></h4>
                </div>
                <div class="irs-lc-footer">
                  <div class="irs-lc-normal-part">
                    <ul class="list-inline">
                      <li><a href="#"><i class="fa fa-users"></i> 108</a></li>
                      <li><a href="#"><i class="fa fa-commenting"></i> 19</a></li>
                    </ul>
                  </div>
                  <div class="irs-lc-hover-part">See Course</div>
                </div>
              </div>
            </div>
            <div class="item animatedParent">
              <div class="irs-lc-grid text-center animated growIn delay-250">
                <div class="irs-lc-grid-thumb">
                  <img class="img-responsive img-fluid" src="images/courses/7.jpg" alt="7.jpg">
                  <div class="irs-lc-overlay"></div>
                  <div class="irs-lc-price">$40.50</div>
                </div>
                <div class="irs-lc-details">
                  <div class="irs-lc-teacher-info">
                    <div class="irs-lct-thumb"><img src="images/courses/s5.png" alt="s5.png"></div>
                    <div class="irs-lct-info">with <span class="text-thm2"> Jessica Hamson</span></div>
                  </div>
                  <h4 class="irs-extraspce"><a href="#">Bosnian, Croatian, Serbian (BOSCRSR)</a></h4>
                </div>
                <div class="irs-lc-footer">
                  <div class="irs-lc-normal-part">
                    <ul class="list-inline">
                      <li><a href="#"><i class="fa fa-users"></i> 87</a></li>
                      <li><a href="#"><i class="fa fa-commenting"></i> 27</a></li>
                    </ul>
                  </div>
                  <div class="irs-lc-hover-part">See Course</div>
                </div>
              </div>
            </div>
            <div class="item animatedParent">
              <div class="irs-lc-grid text-center animated growIn delay-250">
                <div class="irs-lc-grid-thumb">
                  <img class="img-responsive img-fluid" src="images/courses/8.jpg" alt="8.jpg">
                  <div class="irs-lc-overlay"></div>
                  <div class="irs-lc-price">free</div>
                </div>
                <div class="irs-lc-details style2">
                  <div class="irs-lc-teacher-info">
                    <div class="irs-lct-thumb"><img src="images/courses/s6.png" alt="s6.png"></div>
                    <div class="irs-lct-info">with <span class="text-thm2"> Meryl Hawkinson</span></div>
                  </div>
                  <h4><a href="#">Chemical & Biomolecular Engineering</a></h4>
                </div>
                <div class="irs-lc-footer">
                  <div class="irs-lc-normal-part">
                    <ul class="list-inline">
                      <li><a href="#"><i class="fa fa-users"></i> 210</a></li>
                      <li><a href="#"><i class="fa fa-commenting"></i> 10</a></li>
                    </ul>
                  </div>
                  <div class="irs-lc-hover-part">See Course</div>
                </div>
              </div>            
            </div>
            <div class="item animatedParent">
              <div class="irs-lc-grid text-center animated growIn delay-250">
                <div class="irs-lc-grid-thumb">
                  <img class="img-responsive img-fluid" src="images/courses/6.jpg" alt="6.jpg">
                  <div class="irs-lc-overlay"></div>
                  <div class="irs-lc-price">$35.99</div>
                </div>
                <div class="irs-lc-details style2">
                  <div class="irs-lc-teacher-info">
                    <div class="irs-lct-thumb"><img src="images/courses/s4.png" alt="s4.png"></div>
                    <div class="irs-lct-info">with <span class="text-thm2"> Annie Thornburg</span></div>
                  </div>
                  <h4><a href="#">African American Studies (AFRICAM)</a></h4>
                </div>
                <div class="irs-lc-footer">
                  <div class="irs-lc-normal-part">
                    <ul class="list-inline">
                      <li><a href="#"><i class="fa fa-users"></i> 108</a></li>
                      <li><a href="#"><i class="fa fa-commenting"></i> 19</a></li>
                    </ul>
                  </div>
                  <div class="irs-lc-hover-part">See Course</div>
                </div>
              </div>
            </div>
            <div class="item animatedParent">
              <div class="irs-lc-grid text-center animated growIn delay-250">
                <div class="irs-lc-grid-thumb">
                  <img class="img-responsive img-fluid" src="images/courses/5.jpg" alt="5.jpg">
                  <div class="irs-lc-overlay"></div>
                  <div class="irs-lc-price">free</div>
                </div>
                <div class="irs-lc-details">
                  <div class="irs-lc-teacher-info">
                    <div class="irs-lct-thumb"><img src="images/courses/s3.png" alt="s3.png"></div>
                    <div class="irs-lct-info">with <span class="text-thm2"> Jessica Hamson</span></div>
                  </div>
                  <h4><a href="#">Applied Science and Best Technology (AST)</a></h4>
                </div>
                <div class="irs-lc-footer">
                  <div class="irs-lc-normal-part">
                    <ul class="list-inline">
                      <li><a href="#"><i class="fa fa-users"></i> 321</a></li>
                      <li><a href="#"><i class="fa fa-commenting"></i> 4</a></li>
                    </ul>
                  </div>
                  <div class="irs-lc-hover-part">See Course</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Social Media Section -->
  <section class="irs-social-media">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 col-sm-6 col-md-6 text-right style2">              
          <h3 class="irs-social-media-ttl">Edu Hub Social Networks:</h3>
        </div>
        <div class="col-sm-12 col-sm-6 col-md-6">
          <div class="irs-sm-details">
            <ul class="list-inline">
              <li><a href="#"><span class="flaticon-social-3"></span></a></li>
              <li><a href="#"><span class="flaticon-social-4"></span></a></li>
              <li><a href="#"><span class="flaticon-social-1"></span></a></li>
              <li><a href="#"><span class="flaticon-social-media"></span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection