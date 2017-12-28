<!-- Header Styles -->
<div class="header-nav">
  <div class="main-header-nav scrollingto-fixed irs-menu-style-one">
    <div class="container">
      <nav class="navbar navbar-default bootsnav irs-menu-style-one yellow">
        <div class="container irs-pad-zero">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i
                  class="fa fa-bars"></i></button>
            <a class="navbar-brand" href="{{ route('index') }}"><img
                  src="{{ asset('img/logo.png') }}" style="max-width: 161px; max-height: 50px"  class="logo img-responsive" alt="header-logo.png"></a>
          </div>
          @php
            $categories = \App\CourseCategory::all();
          @endphp
          <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-left">
              </li>
              <li class="dropdown"><a href="{{ route('all-course') }}" >All Courses</a>
              </li>
              <li class="dropdown"><a href="#" class="dropdown-toggle"
                                      data-toggle="dropdown">Categories</a>
                <ul class="dropdown-menu">
                   @foreach($categories as $category)

                  <li><a href="{{route('category', ['id' => $category->id])}}">{{$category->name}}</a></li>

                  @endforeach
                </ul>
              </li>
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Features</a>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('user.get_create_course') }}">Become A Teacher</a></li>
                </ul>

            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>
</div>
