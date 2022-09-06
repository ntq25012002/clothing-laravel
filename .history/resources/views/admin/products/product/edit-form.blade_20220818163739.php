@extends('layouts.main')

{{-- @section('meta') --}}
	
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

{{-- @endsection --}}
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/product.css')}}">
@endsection
@section('content-header-title')
    <h3>Sửa sản phẩm {{$product->name}}</h3>
@endsection

@section('content')
<div class="d-flex">
    <div class="col-8">
        <form action="" method="post" enctype="multipart/form-data" class="form mb-2">
            <div class="card">
            <div class="card-body">
                @if (session('msg'))
                <div class="alert">
                    {{-- {{ session('msg') }} --}}
                </div>
                    <script>
                        Swal.fire('Saved!', '', 'success')
                    </script>
                @endif
                    @csrf
                    <input type="file" name="images[]" id="images" multiple hidden>
                    <input type="file" name="feature_image" id="feature_image" multiple hidden>
                    {{-- <input class="form-control" type="hidden" name="_token" id="" value="{{ csrf_token() }}"> --}}
                    <div class="d-flex">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="">Tên sản phẩm</label>
                                <input class="form-control" type="text" name="name" id=""
                                    value="{{ old('name') ?? $product['name'] }}">
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
                                        value="{{ old('price') ?? $product['price'] }}">
                                    @error('price')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6 pr-0">
                                    <label class="form-label" for="">Giá khuyến mãi</label>
                                    <input class="form-control" type="number" name="promotional_price" id=""
                                        value="{{ old('promotional_price') ?? $product['promotional_price'] }}">
                                    @error('promotional_price')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>   
                        </div>
    
                        <div class="col-sm-6 ">
                            <div class=" d-flex">
                                <div class="form-group col-sm-6 px-0">
                                    <label class="form-label" for="">Số lượng</label>
                                    <input class="form-control" type="number" name="quantity" id=""
                                        value="{{ old('quantity') ?? $product['quantity'] }}">
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
                                            {{ $category['id'] == old('category_id') ? 'selected' : '' }}
                                            {{$category['id'] == $product['category_id'] ? 'selected' : '' }}    >
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
                                <label for="" class="form-label">Nhập tags</label>
                                <select name="tags[]" class="form-control tag_select2" multiple="multiple">
                                    {{-- <option selected="selected">orange</option>
                                        <option>white</option>
                                        <option selected="selected">purple</option> --}}
                                    @foreach ($product->tags as $tagItem)
                                        <option selected="selected">{{$tagItem->name}}</option>
                                    @endforeach
                                </select>
                                <div>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="">Slug</label>
                                <input class="form-control" type="text" name="slug" id=""
                                    value="{{ old('slug') ?? $product['slug']}}">
                                @error('slug')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            
                        </div>
                    </div>
    
                    <div class="mb-3 col-sm-12">
                        <label class="form-label" for="description">Mô tả sản phẩm</label>
                        <textarea name="description" class=" my-editor" rows="10" >{{$product->description}}</textarea>
                    </div>
                    
                </div>
            </div>
        </form>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <div>
                    <div class=" px-0 image-feature">
                        <label class="form-label" for="">Ảnh đại diện</label>
                        <input class="" id="formFile" type="file" onchange="previewImage()"
                            name="" hidden>
                        <div class="card1">
                            <label for="formFile" class='text-label'>Chọn ảnh đại diện</label>
                        </div>
                        <div class="image-preview">
                            <img src="" id="img-preview" alt="" width="90%">
                        </div>
                        @error('feature_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class=" pr-0 image-details">
                        <label class="form-label" for="">Ảnh chi tiết</label>
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
                <div class="d-flex justify-content-center mt-3 col-12">
                    <a href="{{ route('admin.product.index') }}" class="btn btn-success mx-2 text-white">Danh sách</a>
                    <div data-url="{{ route('admin.product.edit',['id' =>$product['id'] ])}}" name="submit" class="btn btn-primary btn-submit">Cập nhật sản phẩm</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tiny.cloud/1/d9jmiwsqfuat7aku5t7j2hc9sv46qp2sfcflce1eyscm7wno/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="{{ asset('dist/js/add.js') }}"></script>
    <script src="{{ asset('dist/js/product/edit-product.js') }}"></script>

    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

   
@endsection
