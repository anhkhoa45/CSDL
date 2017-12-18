@extends('layouts.dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/pages/profile.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-fileinput.css') }}">
    <link rel="shortcut icon" href="favicon.ico"/>
@endsection

@section('content')
    @php
        $user = auth()->guard('admin')->user();
    @endphp
    <div class="container">
        <div class="profile">
            <div class="tabbable-line tabbable-full-width">
                <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1_3" data-toggle="tab"> Account </a>
                        </li>

                </ul>
                <div class="tab-content">
                    @include('user.profile-partials.account')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/bootstrap-fileinput.js') }}" type="text/javascript"></script>
@endsection
