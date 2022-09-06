{{-- <h3>Thêm sinh viên mới</h3> --}}

@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/product.css')}}">
    <style>
        .card2 {
            width: 400px;
            height: auto;
            padding: 15px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
            border-radius: 5px;
            overflow: hidden;
            background: #fafbff;
        }
        .card2 .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }
        .card2 .top p {
            font-size: 0.9rem;
            font-weight: 600;
            color: #878a9a;
        }
        .card2 .top button {
            outline: 0;
            border: 0;
            -webkit-appearence: none;
            background: #5256ad;
            color: #fff;
            border-radius: 4px;
            transition: 0.3s;
            cursor: pointer;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
            font-size: 0.8rem;
            padding: 8px 13px;
        }
        .card2 .top button:hover {
            opacity: 0.8;
        }
        .card2 .top button:active {
            transform: translateY(5px);
        }
        .form-upload {
            width: 100%;
            height: 160px;
            border-radius: 5px;
            border:  2px dashed #d5d5e1;
            color: #c8c9dd;
            font-size: 0.9rem;
            font-weight: 500;
            position: relative;
            background: #dfe3f259;
            display: flex;
            justify-content: center;
            align-items: center;
            user-select: none;
            margin-top: 20px;
        }
        .form .select {
            color: #5256ad;
            margin-left: 7px;
            cursor: pointer;
        }
        .form input {
            display: none;
        }
        .form.dragover {
            border-style: solid;
            font-size: 2rem;
            color: #c8c9dd;
            font-weight: 600;
            background: rgba(0, 0, 0, 0.34);
        }
        .box {
            width: 100%;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            flex-wrap: wrap;
            position: relative;
            height: auto;
            margin-top: 20px;
            max-height: 300px;
            overflow-y: auto;
        }
        .box .image {
            height: 85px;
            width: 85px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            position: relative;
            margin-bottom: 7px;
            margin-right: 7px;
        }
        .box .image:nth-child(4n) {
            margin-right: 0;
        }
        .box .image img {
            height: 100%;
            width: 100%;
        }
        .box .image span {
            position: absolute;
            top: -4px;
            right: 5px;
            cursor: pointer;
            font-size: 22px;
            color: #fff;
        }
        .box .image span:hover {
            opacity: 0.8;
        }
    </style>
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

                        <div class=" d-flex">
                            <div class="form-group col-sm-6 px-0 image-feature">
                                <label class="form-label" for="">Ảnh đại diện</label>
                                <input class="" id="formFile" type="file" onchange="previewImage()"
                                    name="feature_image" value="{{ old('feature_image') }}">
                                <div class="image-preview">
                                    <img src="" id="img-preview" alt="" >
                                </div>
                                @error('feature_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6 pr-0 image-details">
                                <label class="form-label" for="">Ảnh chi tiết</label>
                                {{-- <input type="file" class="form-control" id="imageDetails" multiple name="images[]">
                                <div class="d-flex flex-wrap imageDetailsContainer">
                                   
                                </div>
                                @error('images')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror --}}
                                <div class="card2">
                                    <div class="top">
                                        <p>Drag & drop image uploading</p>
                                        <button type="button">Upload</button>
                                    </div>
                                    <div>
                                        <form action="">
                                            
                                        </form>
                                        <form action="/upload" method="post" class="form" id="form">
                                            <span class="inner">Drag & drop image here or <span class="select">Browse</span></span>
                                            <input name="file" type="file" class="file" multiple />
                                        </form>
                                    </div>
                                    <div class="box"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mb-3 col-sm-12">
                    <label class="form-label" for="description">Mô tả sản phẩm</label>
                    <textarea name="description" class="form-control my-editor" rows="10"></textarea>
                    {{-- <textarea class="form-control" id="description" rows="6"></textarea> --}}
                </div>
                <div class="d-flex justify-content-end mt-3 col-12">
                    <a href="{{ route('admin.product.index') }}" class="btn btn-success mx-2 text-white">Danh sách</a>
                    <button type="submit" name="submit" class="btn btn-primary">Thêm sản phẩm</button>
                </div>
            </form>
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
