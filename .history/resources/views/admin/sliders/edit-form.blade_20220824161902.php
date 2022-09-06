{{-- <h3>Thêm sinh viên mới</h3> --}}

@extends('layouts.main')

@section('content-header-title')
    <h3>Thêm slider</h3>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">

            @if (session('msg'))
                <div class="alert alert-success" role="alert">
                    {{ session('msg') }}
                </div>
            @endif
            <form action="" method="post" enctype="multipart/form-data" class="form">
                @csrf
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class=" control-label">
                            Tiêu đề
                        </label>
                        <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề" value="{{old('title') ?? $slider['title']}}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class=" control-label">
                            Hình ảnh
                        </label>
                        <input type="file" name="imageFile" id="formFile" class="form-control-file" onchange="previewImage()">
                        <div class="mt-2">
                            <img src="{{$slider['image_path']}}" id="img-preview" alt="" width="100%">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class=" control-label">
                            Mô tả
                        </label>
                        <textarea name="description" id="" cols="30" rows="6" class="form-control">{{old('description') ?? $slider['description']}}</textarea>
                    </div>
                    
                </div>
            
                <div class="d-flex justify-content-start mt-3 col-12">
                    <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{route('admin.slider.index')}}" class="btn btn-success mx-2 text-white">Quay lại</a>
                </div>
                
            </form>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        const img = document.getElementById('formFile');
        // img.onchange = previewImage()
        function previewImage() {
            const file = img.files[0];
            const preview = document.getElementById('img-preview');
            console.log(preview);
            const reader = new FileReader();
            reader.addEventListener('load', function() {
                console.log(reader.result);
                preview.src = reader.result;
            },false);
            
            if(file) {
                reader.readAsDataURL(file);
            }

        }
    </script>
@endsection

