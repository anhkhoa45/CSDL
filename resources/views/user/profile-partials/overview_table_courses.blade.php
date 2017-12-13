<div class="tabbable-line tabbable-custom-profile">
  <ul class="nav nav-tabs">
    <li class="active">
      <a href="#tab_1_11" data-toggle="tab"> My courses </a>
    </li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab_1_11">
      <div class="portlet-body">
        <table class="table table-striped table-bordered table-advance table-hover">
          <thead>
          <tr>
            <th> # </th>
            <th> <i class="fa fa-leanpub"></i> Course <i class="fa fa-sort pull-right" aria-hidden="true"></i></th>
            <th> <i class="fa fa-bookmark"></i> Price <i class="fa fa-sort pull-right" aria-hidden="true"></i></th>
            <th> <i class="fa fa-users"></i> Buyers <i class="fa fa-sort pull-right" aria-hidden="true"></i></th>
            <th> <i class="fa fa-money"></i> Total Revenue <i class="fa fa-sort pull-right" aria-hidden="true"></i></th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          @php
            $count = 1;
          @endphp
          @foreach($teachingCourses as $teachingCourse)
            <tr>
              <td>{{ $count++ }}</td>
              <td>{{ $teachingCourse->name }}</td>
              <td>{{ $teachingCourse->cost }}</td>
              <td>{{ $teachingCourse->buyers->count() }}</td>
              <td>{{ $teachingCourse->buyers->count() * $teachingCourse->cost }}</td>
              <td>
                <a href="{{ route('user.teaching_course_detail', ['id' => $teachingCourse->id]) }}" class="btn green">Detail</a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        <div class="text-center">
          {{ $teachingCourses->links('vendor.pagination.bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>