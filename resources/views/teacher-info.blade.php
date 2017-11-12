@extends('layouts.main')

@section('style')
  <style>
    .pagination-links {
      text-align: center;
      margin-top: 100px;
    }
  </style>
@endsection

@section('content')

  <!-- Breadcrumbs Styles -->  
  <section class="irs-ip-breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-lg-offset-3 text-center">
          <h1 class="irs-bc-title">Teacher</h1>
        </div>
      </div>
    </div>
  </section>

  <!-- Breadcrumbs html --> 
  <section class="irs-ip-brdcrumb">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-right irs-bb-right">
          <ul class="list-inline irs-brdcrmb">
            <li><a href="#">Home</a></li>
            <li><a href="#"> > </a></li>
            <li><a href="#">Teacher</a></li>
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
            <div class="col-md-4 irs-mrgnbtm-sxty">
              <div class="irs-courses-td-sngle">
                <div class="irs-ctds-thumb">
                  <img class="img-responsive img-fluid" src="{{ \Storage::url($teacher->avatar) }}" alt="tmd1.png">
                </div>
              </div>
            </div>
            <div class="col-md-8 irs-mrgnbtm-sxty">
              <div class="irs-courses-td-sngle-dtls irs-all-course-bb">
                <h2>{{ $teacher->gender.$teacher->name }}</h2>
                <p style="color: grey"><i class="fa fa-birthday-cake" aria-hidden="true"></i> {{ $teacher->DOB }}</p>
                <h3>Teaching score:</h3>
                <p><i style="color: gold" class="fa fa-trophy" aria-hidden="true"></i> {{ $teacher->teaching_score }}</p>

              </div>
              <ul class="list-inline irs-tctt">
                <li><span class="text-thm2 flaticon-key-1"></span> {{ $teacher->address }}</li>
                <li><span class="text-thm2 flaticon-multimedia"></span> {{ $teacher->email }}</li>
              </ul>
              <div class="irs-social-icon-td-sngle-dtls">
                <ul class="list-inline irs-courses-tdetls style2">
                  <li class="fbok"><a href="#"><span class="flaticon-social-3"></span> </a></li>
                  <li class="twtr"><a href="#"><span class="flaticon-social-4"></span> </a></li>
                  <li class="gplus"><a href="#"><span class="flaticon-social-media-1"></span> </a></li>
                  <li class="linkdin"><a href="#"><span class="flaticon-linkedin-logo"></span> </a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="irs-tdetails-content">
                <p>Following graduation Edward joined the Sul Lab at the University of California (UC), Berkeley in the Department of NutritionSciences and Toxicology, as a post doctoral fellow.  While at UC Berkeley, she carried out studies aimed at examining to role of lipases in regulation of obesity and insulin secretion.</p>
                <p>Following his time as at UC Edu Hub, Edward accepted a position as a Research Scholar in the Endocrine Research Unit, VA Medical Center, UC San Francisco. His work at UCSF focused on the examination of potential regulators of mesenchymal stem cell commitment towards adipocyte lineages. </p>
              </div>
              <div class="irs-cdtls-ttbg2">
                <h3>Enrolled Courses</h3>
                <em><span class="flaticon-signs-2"></span> No purchased courses.</em>
              </div>
              <div class="irs-cdtls-ttbg2">
                <h3>Finished Courses</h3>
                <em><span class="flaticon-signs-2"></span> No purchased courses.</em>
              </div>
              <div class="irs-cdtls-ttbg2">
                <h3>Own Courses</h3>
                <div class="irs-td-carousel">
                  <div class="item">
                    <div class="irs-lc-grid text-center">
                      <div class="irs-lc-grid-thumb">
                        <img class="img-responsive img-fluid" src="images/courses/11.jpg" alt="11.jpg">
                        <div class="irs-lc-overlay"></div>
                        <div class="irs-lc-price">free</div>
                      </div>
                      <div class="irs-lc-details">
                        <div class="irs-lc-teacher-info">
                          <div class="irs-lct-thumb"><img src="images/team/xs1.png" alt="xs1.png"></div>
                          <div class="irs-lct-info">with <span class="text-thm2"> Edward J. Wallen</span></div>
                        </div>
                        <h4><a href="#">Applied Science and Best Technology (AST)</a></h4>
                      </div>
                      <div class="irs-lc-footer">
                        <div class="irs-lc-normal-part">
                          <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-users"></i> 287</a></li>
                            <li><a href="#"><i class="fa fa-commenting"></i> 76</a></li>
                          </ul>
                        </div>
                        <div class="irs-lc-hover-part">See Course</div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="irs-lc-grid text-center">
                      <div class="irs-lc-grid-thumb">
                        <img class="img-responsive img-fluid" src="images/courses/12.jpg" alt="12.jpg">
                        <div class="irs-lc-overlay"></div>
                        <div class="irs-lc-price">$29.99</div>
                      </div>
                      <div class="irs-lc-details style2">
                        <div class="irs-lc-teacher-info">
                          <div class="irs-lct-thumb"><img src="images/team/xs1.png" alt="xs1.png"></div>
                          <div class="irs-lct-info">with <span class="text-thm2"> Edward J. Wallen</span></div>
                        </div>
                        <h4 class="irs-extraspce"><a href="#">Dentistry & Teeth Class Operations</a></h4>
                      </div>
                      <div class="irs-lc-footer">
                        <div class="irs-lc-normal-part">
                          <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-users"></i> 234</a></li>
                            <li><a href="#"><i class="fa fa-commenting"></i> 53</a></li>
                          </ul>
                        </div>
                        <div class="irs-lc-hover-part">See Course</div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="irs-lc-grid text-center">
                      <div class="irs-lc-grid-thumb">
                        <img class="img-responsive img-fluid" src="images/courses/13.jpg" alt="13.jpg">
                        <div class="irs-lc-overlay"></div>
                        <div class="irs-lc-price">Free</div>
                      </div>
                      <div class="irs-lc-details">
                        <div class="irs-lc-teacher-info">
                          <div class="irs-lct-thumb"><img src="images/team/xs1.png" alt="xs1.png"></div>
                          <div class="irs-lct-info">with <span class="text-thm2"> Edward J. Wallen</span></div>
                        </div>
                        <h4 class="irs-extraspce"><a href="#">Hands Sculpts Clay Crafts Pottery Class</a></h4>
                      </div>
                      <div class="irs-lc-footer">
                        <div class="irs-lc-normal-part">
                          <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-users"></i> 93</a></li>
                            <li><a href="#"><i class="fa fa-commenting"></i> 19</a></li>
                          </ul>
                        </div>
                        <div class="irs-lc-hover-part">See Course</div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="irs-lc-grid text-center">
                      <div class="irs-lc-grid-thumb">
                        <img class="img-responsive img-fluid" src="images/courses/8.jpg" alt="8.jpg">
                        <div class="irs-lc-overlay"></div>
                        <div class="irs-lc-price">free</div>
                      </div>
                      <div class="irs-lc-details style2">
                        <div class="irs-lc-teacher-info">
                          <div class="irs-lct-thumb"><img src="images/team/xs1.png" alt="xs1.png"></div>
                          <div class="irs-lct-info">with <span class="text-thm2"> Edward J. Wallen</span></div>
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
                </div>
              </div>
              <div class="irs-cdtls-ttbg2">
                <h3>Events</h3>
                <table class="table"> 
                  <thead> 
                    <tr class="irs-table-deading"> 
                      <th class="text-center">ID</th> 
                      <th>Name</th> 
                      <th>Duration</th> 
                      <th>Start Date</th> 
                    </tr> 
                  </thead> 
                  <tbody class="irs-table-body"> 
                    <tr>
                      <th scope="row">#432</th>
                        <td>Philosophy and Modern Languages</td>
                        <td>2.30 hrs.</td>
                        <td>22/02/2017</td> 
                    </tr>
                    <tr> 
                      <th scope="row">#409</th> 
                        <td>Psychology, Philosophy and Linguistics</td> 
                        <td>1.45 hrs.</td> 
                        <td>20/02/2017</td> 
                    </tr> 
                    <tr> 
                      <th scope="row">#416</th> 
                        <td>Modern Languages</td> 
                        <td>30 mins.</td> 
                        <td>19/02/2017</td> 
                    </tr> 
                  </tbody>
                </table>
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

  @include('includes.footer')
@endsection
