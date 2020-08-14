@extends('adminlte.master')
@section('content')
<div class="mt-3 ml-3 mr-3">
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Create New Answer</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="/" method="POST">
        @csrf
            <div class="card-body">
                <!-- content -->
                <div class="form-group">
                <label for="content">Your Answer</label>
                <!-- <input type="text" name="content" class="form-control" value="{{ old('content', '') }}" id="content" placeholder="Content" required> -->
                <textarea name="content" class="form-control my-editor">{!! old('content', '') !!}</textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                </div>
            </div>
        <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Post Answer</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('script')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
@endpush