<div class="page-header navbar navbar-fixed-top">
  <div class="page-header-inner ">
    <div class="page-logo">
      <a href="{{ route('index') }}">
        <img src="{{ asset('img/logo.png') }}" alt="logo" class="logo-default"/>
      </a>
    </div>
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
       data-target=".navbar-collapse">
      <span></span>
    </a>
    <div class="top-menu">
      <ul class="nav navbar-nav pull-right">
        @php
          $user = auth()->user();
        @endphp
        <li class="dropdown dropdown-user">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
             data-close-others="true">
            <img alt="" class="img-circle" src="{{ Storage::url($user->avatar) }}"/>
            <span class="username username-hide-on-mobile"> {{ $user->name }} </span>
            <i class="fa fa-angle-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-default">
            <li>
              <a href="{{ route('profile') }}">
                <i class="icon-user"></i> My Profile </a>
            </li>
            <li>
              <a href="#">
                <i class="icon-calendar"></i> My Calendar </a>
            </li>
            <li>
              <a href="#">
                <i class="icon-envelope-open"></i> My Inbox
                <span class="badge badge-danger"> 3 </span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="icon-rocket"></i> My Tasks
                <span class="badge badge-success"> 7 </span>
              </a>
            </li>
            <li class="divider"></li>

            <li>
              <a href="{{ route('logout') }}"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="icon-key"></i>
                Logout
              </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
            </li>

          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>