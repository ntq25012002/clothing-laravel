{{-- <h3>Thêm sinh viên mới</h3> --}}

@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/product.css')}}">
    
@endsection

@section('content-header-title')
    <h3>Thêm sản phẩm</h3>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('msg'))
                <div class="alert alert-success" role="alert">
                    {{ session('msg') }}
                </div>
            @endif
            @if($errors->any())
                <ul>
                    @foreach ($errors->all() as $err)
                        <li>
                            {{$err}}
                        </li>
                    @endforeach
                </ul>
            @endif

            <form action="" method="post" enctype="multipart/form-data" class="form mb-2">
                {{-- <input class="form-control" type="text" name="role_id" id=""> --}}
                @csrf
                {{-- <input class="form-control" type="hidden" name="_token" id="" value="{{ csrf_token() }}"> --}}
                <div class="d-flex">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="">Tên sản phẩm</label>
                            <input class="form-control" type="text" name="name" id=""
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex">
                            <div class="form-group col-sm-6  px-0">
                                <label class="form-label" for="">Giá sản phẩm</label>
                                <input class="form-control" type="number" name="price" id=""
                                    value="{{ old('price') }}">
                                @error('price')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6 pr-0">
                                <label class="form-label" for="">Giá khuyến mãi</label>
                                <input class="form-control" type="number" name="promotional_price" id=""
                                    value="{{ old('promotional_price') }}">
                                @error('promotional_price')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="">Slug</label>
                            <input class="form-control" type="text" name="slug" id=""
                                value="{{ old('slug') }}">
                            @error('slug')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6 ">
                        <div class=" d-flex">
                            <div class="form-group col-sm-6 px-0">
                                <label class="form-label" for="">Số lượng</label>
                                <input class="form-control" type="number" name="quantity" id=""
                                    value="{{ old('quantity') }}">
                                @error('quantity')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6 pr-0">
                                <label class="form-label" for="">Danh mục</label>
                                <select class="form-control form-select category_select2" name="category_id" id="">
                                    <option value=""> </option>
                                    @foreach ($categoryTree as $category)
                                        <option value="{{ $category['id'] }}"
                                            {{ $category['id'] == old('category_id') ? 'selected' : '' }}>
                                            {{ str_repeat('--', $category['level']) . ' ' . $category['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Nhập tags</label>
                            <select name="tags[]" class="form-control tag_select2" multiple="multiple">
                                {{-- <option selected="selected">orange</option>
                        <option>white</option>
                        <option selected="selected">purple</option> --}}
                            </select>
                        </div>

                        
                    </div>

                </div>

                <div class="mb-3 col-sm-12">
                    <label class="form-label" for="description">Mô tả sản phẩm</label>
                    <textarea name="description" class="form-control my-editor" rows="10"></textarea>
                    {{-- <textarea class="form-control" id="description" rows="6"></textarea> --}}
                </div>
            </form>
            
            
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div >
                <div class="form-group col-sm-4 px-0 image-feature">
                    <label class="form-label" for="">Ảnh đại diện</label>
                    <input class="" id="formFile" type="file" onchange="previewImage()"
                        name="feature_image" value="{{ old('feature_image') }}">
                    <div class="image-preview">
                        <img src="" id="img-preview" alt="" width="90%">
                    </div>
                    @error('feature_image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-sm-8  pr-0 image-details">
                    <label class="form-label pl-4" for="">Ảnh chi tiết</label>
                    {{--
                    @error('images')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror --}}
                    <div class="card2">
                        <div>
                            <form action=""></form>
                            <form action="" method="post" class="form-upload" id="form">
                                <span class="inner"><span class="select">Chọn ảnh chi tiết</span></span>
                                <input name="file" type="file" class="file" multiple />
                            </form>
                        </div>
                        <div class="box"></div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3 col-12">
                <a href="{{ route('admin.product.index') }}" class="btn btn-success mx-2 text-white">Danh sách</a>
                <button type="submit" name="submit" class="btn btn-primary btn-submit">Thêm sản phẩm</button>
            </div>
        </div>
    </div>
<pre><code class="language-html"></code></pre>
<pre><code class="language-css"></code></pre>
<pre><code class="language-javascript"></code></pre>
@endsection

@section('page-script')
    <script src="https://cdn.tiny.cloud/1/d9jmiwsqfuat7aku5t7j2hc9sv46qp2sfcflce1eyscm7wno/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="{{ asset('dist/js/add.js') }}"></script>
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
