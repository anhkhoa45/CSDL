@extends('layouts.main')

@section('content')
  <textarea id="my-editor" name="content" class="form-control">{!! old('content', 'test editor content') !!}</textarea>
@endsection

@section('script')
  <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
  <script>
      var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
      $('textarea.my-editor').ckeditor({
          height: 100,
          filebrowserImageBrowseUrl: route_prefix + '?type=Images',
          filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
          filebrowserBrowseUrl: route_prefix + '?type=Files',
          filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
      });
  </script>
@endsection