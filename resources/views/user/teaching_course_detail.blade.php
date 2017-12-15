@extends('layouts.dashboard')

@section('style')
  <link href="{{ asset('css/pages/daterangepicker.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/pages/morris.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  <div class="container">
    <div class="page-bar">
      <ul class="page-breadcrumb">
        <li>
          <a href="{{ route('profile') }}">Home</a>
          <i class="fa fa-circle"></i>
        </li>
        <li>
          <span>Teaching course</span>
          <i class="fa fa-circle"></i>
        </li>
        <li>
          <span>{{ $course->id }}</span>
        </li>
      </ul>
      <div class="page-toolbar">
        <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
          <i class="icon-calendar"></i>&nbsp;
          <span class="thin uppercase hidden-xs"></span>&nbsp;
          <i class="fa fa-angle-down"></i>
        </div>
      </div>
    </div>
    <h3 class="page-title"><strong>Course:</strong> {{ $course->name }}
      <small>dashboard & statistics</small>
    </h3>
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
          <div class="visual">
            <i class="fa fa-comments"></i>
          </div>
          <div class="details">
            <div class="number">
              <span data-counter="counterup" data-value="{{ $course->getBuyersInPeriod(7) }}">0</span>
            </div>
            <div class="desc"> New Students (this week) </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="#">
          <div class="visual">
            <i class="fa fa-bar-chart-o"></i>
          </div>
          <div class="details">
            <div class="number">
              <span data-counter="counterup" data-value="{{ $course->getTotalBuyers() }}">0</span>
            </div>
            <div class="desc"> Total Student </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 green" href="#">
          <div class="visual">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <div class="details">
            <div class="number"> +
              <span data-counter="counterup" data-value="{{ $course->getBuyersInPeriod(7) * $course->cost }}">0</span> $
            </div>
            <div class="desc"> Week Profits </div>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
          <div class="visual">
            <i class="fa fa-globe"></i>
          </div>
          <div class="details">
            <div class="number">
              <span data-counter="counterup" data-value="{{ $course->getTotalBuyers() * $course->cost }}"></span> $
            </div>
            <div class="desc"> Total Profits </div>
          </div>
        </a>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-sm-12">
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('js/pages/jquery.counterup.min.js') }}"></script>
  <script src="{{ asset('js/pages/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('js/pages/jquery.canvasjs.min.js') }}"></script>
  <script>
      $(document).ready(function () {
          let options = {
              animationEnabled: true,
              title:{
                  text: "Monthly Sales"
              },
              axisX: {
                  valueFormatString: "DD/MM/YYYY"
              },
              axisY: {
                  title: "Sales (in USD)",
                  prefix: "$",
                  titleFontColor: "#4F81BC",
                  lineColor: "#4F81BC",
                  tickColor: "#4F81BC",
              },
              data: [
                  {
                      yValueFormatString: "$#,###",
                      xValueFormatString: "DD/MM/YYYY",
                      type: "spline",
                      dataPoints: [
                          @foreach($monthlyBuyers as $monthlyBuyer)
                          { x: new Date('{{ $monthlyBuyer->month}}'), y: parseInt({{ $monthlyBuyer->buyers * $course->cost }}) },
                          @endforeach
                      ]
                  }
              ]
          };
          $("#chartContainer").CanvasJSChart(options);
      });
  </script>
@endsection