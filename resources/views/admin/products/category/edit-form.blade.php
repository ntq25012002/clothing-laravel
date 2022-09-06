@extends ('admin.layouts.main')

@section('content-header-title')
    Sửa danh mục
@endsection

@section('content')
    <div class='col-md-3'>

    </div>
    <div class="col-md-6">

        @if(session('msg'))
            <div class="alert alert-success">
                {{session('msg')}}
            </div>
        @endif
        <form action="" method="post" enctype="multipart/form-data"class="form-horizontal">
            @csrf
            <div class="form-group">
                <label for="">Tên danh mục</label>
                <input type="text" name="name" id="" class="form-control" placeholder="Tên danh mục" value="{{old('name') ?? $category['name']}}">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Thuộc danh mục</label>
                <select name="parent_id" id="" class="form-control form-control-select">
                    <option value="0">--- Trống ---</option>
                    @foreach ($categoriesTree as $category)
                        <option value="{{$category['id']}}" {{$category['id'] == $parentId ? 'selected' : '' }} {{$category['id'] == old('parent_id') ? 'selected':''}} >{{ str_repeat('--',$category['level']) .' '.$category['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" name="slug" id="" class="form-control" placeholder="Nhập slug" value="{{old('slug') ?? $category['slug']}}">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{route('admin.category.index')}}" class="btn btn-warning text-white">Quay lại</a>
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
@endsection
