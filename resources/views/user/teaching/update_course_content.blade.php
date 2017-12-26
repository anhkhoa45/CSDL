@extends('layouts.dashboard')

@section('style')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-fileinput.css') }}">
  <link rel="shortcut icon" href="favicon.ico"/>

  <style>
    ul {
      padding: 0;
    }
    ul li {
      list-style-type: none;
    }
    .content-info .row label {
      text-align: right;
    }
    .content-info .row {
      margin-bottom: 15px;
    }
    .bg-video {
      color: #1BBC9B;
    }
    .bg-project {
      color: #F7CA18;
    }
  </style>
@endsection

@section('content')
  <div class="container">
    @if ($errors->has('create_failed'))
      <span class="help-block">
            <strong>{{ $errors->first('create_failed') }}</strong>
        </span>
    @endif
    <div class="portlet light form-fit bordered">
      <div class="portlet-title">
        <div class="caption center-block">
          <i class="icon-settings font-green"></i>
          <span class="caption-subject font-green sbold uppercase">Update Course Contents</span>
        </div>
      </div>
      <div class="portlet-body form">
        <form class="form-horizontal form-bordered" enctype="multipart/form-data"
              action="{{ route('user.create_course') }}" method="POST">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
          <div class="form-body">
            <ul id="sortable">
              @foreach($courseContents as $courseContent)
                <li>
                  <div class="form-group">
                    @if(get_class($courseContent) === \App\Video::class)
                      <label class="col-md-1 control-label bg-video" data-toggle="tooltip" title="Video">
                        Video <br>
                        #<span class="content-order">{{ $courseContent->order_in_course }}</span>
                      </label>
                      <div class="col-md-8 content-info">
                        <div class="row">
                          <div class="col-md-12">
                            <input class="input-editable form-control" type="text" value="{{ $courseContent->name }}">
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-2">URL</label>
                          <div class="col-md-10">
                            <input class="input-editable form-control" type="text" value="{{ $courseContent->url }}">
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-2">Description</label>
                          <div class="col-md-10">
                            <textarea class="input-editable form-control">{{ $courseContent->description }}</textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <iframe src="{{ $courseContent->url }}" frameborder="0"></iframe>
                      </div>
                    @elseif(get_class($courseContent) === \App\RequiredProject::class)
                      <label class="col-md-1 control-label bg-project"  data-toggle="tooltip" title="Project">
                        Project <br>
                        #<span class="content-order">{{ $courseContent->order_in_course }}</span>
                      </label>
                      <div class="col-md-8 content-info">
                        <div class="row">
                          <label class="col-md-2">Name</label>
                          <div class="col-md-10">
                            <input class="input-editable form-control" type="text" value="{{ $courseContent->name }}">
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-md-2">Project requirements</label>
                          <div class="col-md-10">
                            <textarea class="input-editable form-control">{{ $courseContent->description }}</textarea>
                          </div>
                        </div>
                      </div>
                    @endif

                  </div>
                </li>
              @endforeach
            </ul>
          </div>
          <div class="form-actions">
            <div class="row">
              <div class="col-md-offset-2 col-md-9 text-center">
                <button type="submit" class="btn green"><i class="fa fa-check"></i> Submit</button>
                <a href="{{ route('index') }}" class="btn btn-outline grey-salsa">Cancel</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('js/bootstrap-fileinput.js') }}" type="text/javascript"></script>

  <script>

      $(function () {
          let countContent = 1;

          $("#sortable").sortable({update: updatePosition});

          $("#sortable").find('select').change(function () {
              changeInputType.call(this);
          });

          $("#sortable").find('.btn-remove').click(function () {
              removeCourseContent.call(this)
          });

          $('#btn-add').click(appendCourseContent);

          function appendCourseContent() {
              let newLi = $(`
                <li class="mt-list-item form-inline">
                  <span data-id="${ countContent }" class="content-order">${ $('.content-order').length + 1 }</span>
                  <select data-id="${ countContent }" class="form-control" name="content_type[]">
                    <option value="">Content type</option>
                    <option value="0">Video URL</option>
                    <option value="1">Video</option>
                    <option value="2">Project</option>
                  </select>
                  <input data-id="${ countContent }" type="text" class="new-course-content form-control" disabled
                         name="title[]"/>
                  <input data-id="${ countContent }" type="text" class="new-course-content form-control" placeholder="URL" disabled
                       name="url[]"/>
                  <textarea data-id="${ countContent }" rows="4" cols="70" class="form-control" disabled
                       name="description[]"></textarea>
                  <button type="button" class="btn sbold uppercase btn-outline red-haze pull-right btn-remove">-</button>
                </li>
              `);
              newLi.find('select').change(function () {
                  changeInputType.call(this);
              });
              newLi.find('.btn-remove').click(function () {
                  removeCourseContent.call(this)
              });
              $('#sortable').append(newLi);
              countContent++;
          }

          function updatePosition() {
              $("#sortable").children().each(function (index) {
                  $(this).find('.content-order').html(index + 1)
              });
          }

          function removeCourseContent() {
              $(this).parent().remove();
              updatePosition();
          }

          const bgVideoURL = {
              'background-color': '#1BBC9B',
              'color': 'white'
          };
          const bgVideoFile = {
              'background-color': '#9A12B3',
              'color': 'white'
          };
          const bgProject = {
              'background-color': '#F7CA18',
              'color': 'white'
          };

          function changeInputType() {
              let id = $(this).data('id');
              let inputType = $(this).find('option:selected').val();
              let indexEl = $(`span[data-id="${ id }"]`);
              let titleEl = $(`input[data-id="${ id }"][name^="title"]`);
              let urlEl = $(`input[data-id="${ id }"][name^="url"]`);
              let descEl = $(`textarea[data-id="${ id }"][name^="description"]`);
              if (inputType) {
                  titleEl.prop('disabled', false);
                  urlEl.show();
                  urlEl.prop('disabled', false);
                  descEl.prop('disabled', false);
              }
              switch (inputType) {
                  case '0':
                      indexEl.css(bgVideoURL);
                      urlEl.attr('type', 'url');
                      titleEl.prop('placeholder', 'Video Title');
                      descEl.prop('placeholder', 'Video content description');
                      break;
                  case '1':
                      indexEl.css(bgVideoFile);
                      urlEl.attr('type', 'file');
                      titleEl.prop('placeholder', 'Video Title');
                      descEl.prop('placeholder', 'Video content description');
                      break;
                  case '2':
                      indexEl.css(bgProject);
                      urlEl.hide();
                      titleEl.prop('placeholder', 'Project Title');
                      descEl.prop('placeholder', 'Project content description');
                      break;
              }
          }
      });
  </script>

@endsection
