@extends('layouts.dashboard')

@section('style')
  <link rel="stylesheet" href="{{ asset('css/pages/profile.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap-fileinput.css') }}">
  <link rel="shortcut icon" href="favicon.ico"/>
@endsection

@section('content')
  @php
  $hasPrevPage = false;
  $prevPage = '';

  if(session()->has('page')){
      $hasPrevPage = true;
      $prevPage = session()->get('page');
  } elseif (old('page')){
      $hasPrevPage = true;
      $prevPage = old('page');
  }
  @endphp
  <div class="container">
    <div class="profile">
      <div class="col-md-12">
        @if (session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif
      </div>
      <div class="tabbable-line tabbable-full-width">
        <ul class="nav nav-tabs">
          @if ($hasPrevPage)
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
