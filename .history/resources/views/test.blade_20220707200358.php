@extends('layouts.main')

@section('content-header-title')
    <h3>Test upload multiple files image</h3>
@endsection
@section('content')
<div class="row">
    <div class="col-md-6">
      <div class="input-group">
        <span class="input-group-btn">
          <a data-input="thumbnail" data-preview="holder" class="lfm btn btn-primary">
            <i class="fa fa-picture-o"></i> CHOOSE
          </a>
        </span>
        <input id="thumbnail" class="form-control" type="text" name="image" readonly>
      </div>
      <img id="holder" style="margin-top:15px;max-height:100px;">
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-6">
      <div class="input-group">
        <span class="input-group-btn">
          <a data-input="thumbnail2" data-preview="holder2" class="lfm btn btn-primary">
            <i class="fa fa-picture-o"></i> CHOOSE
          </a>
        </span>
        <input id="thumbnail2" class="form-control" type="text" name="image" readonly>
      </div>
      <img id="holder2" style="margin-top:15px;max-height:100px;">
    </div>
  </div>
@endsection


@section('page-script')
    <script>
        $('[class*="lfm"]').each(function() {
            $(this).filemanager('image', {prefix: admin});
        });
    </script>
@endsection
