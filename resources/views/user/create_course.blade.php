@extends('layouts.dashboard')

@section('style')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-fileinput.css') }}">
  <link rel="shortcut icon" href="favicon.ico"/>
@endsection

@section('content')
  <div class="portlet light form-fit bordered">
    <div class="portlet-title">
      <div class="caption">
        <i class="icon-settings font-green"></i>
        <span class="caption-subject font-green sbold uppercase">Advanced File Input</span>
      </div>
      <div class="actions">
        <input type="checkbox" class="make-switch" checked data-on="success" data-on-color="success" data-off-color="warning" data-size="small"> </div>
    </div>
    <div class="portlet-body form">
      <!-- BEGIN FORM-->
      <form action="#" class="form-horizontal form-bordered">
        <div class="form-body">
          <div class="form-group">
            <label class="control-label col-md-3">Default1</label>
            <div class="col-md-3">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="input-group input-large">
                  <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                    <span class="fileinput-filename"> </span>
                  </div>
                  <span class="input-group-addon btn default btn-file">
                                                                <span class="fileinput-new"> Select file </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="..."> </span>
                  <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Without input</label>
            <div class="col-md-9">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <span class="btn green btn-file">
                                                            <span class="fileinput-new"> Select file </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file" name="..."> </span>
                <span class="fileinput-filename"> </span> &nbsp;
                <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
              </div>
            </div>
          </div>
          <div class="form-group ">
            <label class="control-label col-md-3">Image Upload #1</label>
            <div class="col-md-9">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div>
                <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="..."> </span>
                  <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                </div>
              </div>
              <div class="clearfix margin-top-10">
                <span class="label label-success">NOTE!</span> Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead. </div>
            </div>
          </div>
          <div class="form-group last">
            <label class="control-label col-md-3">Image Upload #2</label>
            <div class="col-md-9">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                  <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                <div>
                                                            <span class="btn default btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="..."> </span>
                  <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                </div>
              </div>
              <div class="clearfix margin-top-10">
                <span class="label label-danger">NOTE!</span> Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead. </div>
            </div>
          </div>
        </div>
        <div class="form-actions">
          <div class="row">
            <div class="col-md-offset-3 col-md-9">
              <a href="javascript:;" class="btn green">
                <i class="fa fa-check"></i> Submit</a>
              <a href="javascript:;" class="btn btn-outline grey-salsa">Cancel</a>
            </div>
          </div>
        </div>
      </form>
      <!-- END FORM-->
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('js/bootstrap-fileinput.js') }}" type="text/javascript"></script>
@endsection
