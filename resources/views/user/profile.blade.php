@extends('layouts.dashboard')

@section('style')
  <link rel="stylesheet" href="{{ asset('css/pages/profile.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap-fileinput.css') }}">
  <link rel="shortcut icon" href="favicon.ico"/>
@endsection

@section('content')
  @php
  $user = auth()->user();
  @endphp
  <div class="container">
    <div class="page-bar">
      <ul class="page-breadcrumb">
        <li><span> Home </span><i class="fa fa-circle"></i></li>
        <li> User </li>
      </ul>
    </div>
    <h3 class="page-title"> My Profile </h3>
    <div class="profile">
      <div class="tabbable-line tabbable-full-width">
        <ul class="nav nav-tabs">
          @if (old('page'))
            <li>
              <a href="#tab_1_1" data-toggle="tab"> Overview </a>
            </li>
            <li class="active">
              <a href="#tab_1_3" data-toggle="tab"> Account </a>
            </li>
          @else
            <li class="active">
              <a href="#tab_1_1" data-toggle="tab"> Overview </a>
            </li>
            <li>
              <a href="#tab_1_3" data-toggle="tab"> Account </a>
            </li>
          @endif

        </ul>
        <div class="tab-content">
          @include('user.profile-partials.overview')
          @include('user.profile-partials.account')
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('js/bootstrap-fileinput.js') }}" type="text/javascript"></script>
@endsection
