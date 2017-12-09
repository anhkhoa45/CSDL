<form class="form-horizontal form-bordered text-center"
    method="POST" action="{{ route('user.update_ava') }}" enctype="multipart/form-data">
  {{ csrf_field() }}
  {{ method_field('PUT') }}
  <input type="hidden" name="page" value="update_ava" class="form-control"/>
  <div class="form-group">
    <div class="fileinput fileinput-new" data-provides="fileinput">
      <div class="fileinput-new thumbnail img-responsive" style="width: 300px; height: 300px;">
        <img src="{{ Storage::url($user->avatar) }}" alt="Avatar"/>
      </div>
      <input type="file" name="avatar">
      @if ($errors->has('avatar'))
        <span class="help-block">
            <strong>{{ $errors->first('avatar') }}</strong>
        </span>
      @endif
    </div>
  </div>
  <div class="margin-top-50">
    <button type="submit" class="btn green"> Submit </button>
  </div>
</form>