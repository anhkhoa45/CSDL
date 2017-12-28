    @extends('admin.layouts.main')
@section('style')
  <style>
    .video-container {
      display: flex;
      align-items: center;
      text-align: center;
    }

    .video-container .btn-prev,
    .video-container .btn-next {
      background: rgba(0, 0, 0, 0);
      font-size: 50px;
      font-weight: 400;
    }
    .file-input {
      width: 1px;
      height: 1px;
      overflow: hidden;
    }
    .submit-area {
      border: solid 1px #0F9E5E;
      border-radius: 10px;
      padding-bottom: 20px;
    }

  </style>
@endsection

@section('content')
  <div class="container-fluid text-center">
    <div class="row margin-bottom-20">
      <div class="col-md-8 col-md-offset-2">
        <h1>{{ $project->name }}</h1>
        <p>{{ $project->description }}</p>
      </div>
    </div>
    <div class="row video-container">
      <div class="col-md-2">
        @if($prev)
          @if(get_class($prev) === \App\Video::class)
            <a href="{{ route('user.watch_video', ['course' => $course->id, 'video' => $prev->id]) }}"
               class="btn btn-lg btn-prev" data-toggle="tooltip" title="Prev: {{ $prev->name }} (Video)">
              <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </a>
          @elseif(get_class($prev) === \App\RequiredProject::class)
            <a href="{{ route('user.get_submit_project', ['course' => $course->id, 'project' => $prev->id]) }}"
               class="btn btn-lg btn-prev" data-toggle="tooltip" title="Prev: {{ $prev->name }} (Project)">
              <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </a>
          @endif
        @endif
      </div>
    </div>

@endsection