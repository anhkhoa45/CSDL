<!-- Header Styles -->
<div class="header-nav">
  <div class="main-header-nav scrollingto-fixed irs-menu-style-one">
    <div class="container">
      <nav class="navbar navbar-default bootsnav irs-menu-style-one yellow">
        <div class="container irs-pad-zero">
          <!-- Start Header Navigation -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i
                  class="fa fa-bars"></i></button>
            <a class="navbar-brand" href="{{ route('index') }}"><img
                  src="{{ asset('images/header-logo.png') }}" class="logo" alt="header-logo.png"></a>
          </div>
          <!-- End Header Navigation -->

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-left">
              <li class="dropdown"><a href="#" class="dropdown-toggle"
                                      data-toggle="dropdown">Categories</a>
                <ul class="dropdown-menu">
                   @foreach($categories as $category)

                  <li><a href="page-courses-category.html">{{$category->name}}</a></li>

                  @endforeach
                </ul>
              </li>
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Features</a>
                <ul class="dropdown-menu">
                  <li><a href="page-become-teacher.html">Become A Teacher</a></li>
                  <li><a href="page-teacher-details.html">Teacher Details</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              @if(Route::has('login'))
                @auth
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-expanded="false" aria-haspopup="true">
                      {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu">
                      <li>
                        <a href="{{ route('profile') }}">
                          My profile <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li>
                        <a href="{{ route('user.enrolled_courses') }}">
                          Enrolled courses <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li>
                        <a href="">
                          Teaching courses <i class="fa fa-line-chart" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                          Logout <i class="fa fa-sign-out" aria-hidden="true"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                          {{ csrf_field() }}
                        </form>
                      </li>
                    </ul>
                  </li>
                  @else
                    <li><a href="{{ route('login') }}">Login / Register</a></li>
                    @endauth
                  @endif
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>
</div>
