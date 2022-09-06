{{-- <h3>Thêm sinh viên mới</h3> --}}

@extends('layouts.main')

@section('content-header-title')
    <h3>Thêm sản phẩm</h3>
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif
    <form action="" method="post" enctype="multipart/form-data" class="form">
        {{-- <input class="form-control" type="text" name="role_id" id=""> --}}
        @csrf
        {{-- <input class="form-control" type="hidden" name="_token" id="" value="{{ csrf_token() }}"> --}}
        <div class="d-flex">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="form-label" for="">Tên sản phẩm</label>
                    <input class="form-control" type="text" name="name" id="" value="{{ old('name') }}">
                    @error('name')
                        <span style="color: tomato">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div>
                    <label class="form-label" for="">Giá sản phẩm</label>
                    <input class="form-control" type="number" name="price" id="" value="{{ old('price') }}">
                    @error('price')
                        <div style="color: tomato">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class=" d-flex">
                    <div class="form-group col-sm-6" style="padding-left:0">
                        <label class="form-label" for="">Ảnh đại diện</label>
                        <input class="form-control" id="formFile" type="file" onchange="previewImage()" name="avatar"
                            value="{{ old('avatar') }}">
                        <div>
                            <img src="" id="img-preview" alt="" style="width:90px">
                        </div>
                        @error('avatar')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="form-label" for="">Danh mục</label>
                        <select class="form-control form-select" name="role_id" id="">
                            <option value=""> ----- Trống -----</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}"
                                    {{ $category['id'] == old('category_id') ? 'selected' : '' }}>
                                    {{ $category['name'] }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="form-group col-sm-6" style="padding-left:0">
                    <label class="form-label" for="">Ảnh chi tiết</label>
                    <input type="file" class="form-control" id="formFile" multiple onchange="previewImage()"
                        name="avatar">
                    {{-- <div>
                        <img src="" id="img-preview" alt="" style="width:90px">
                    </div> --}}
                    @error('avatar')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

        </div>
        <div class="mb-3">
            <label class="form-label" for="description">Mô tả sản phẩm</label>
            <textarea class="form-control" id="description" rows="6"></textarea>
        </div>
        <div class="d-flex justify-content-start mt-3 col-12">
            <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
            <a href="{{ route('admin.product.list') }}" class="btn btn-warning mx-2 text-white">Quay lại</a>
        </div>


    </form>
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
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }

        }
    </script>
@endsection
