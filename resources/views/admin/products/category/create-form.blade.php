@extends ('admin.layouts.main')

@section('content-header-title')
    Thêm danh mục
@endsection

@section('content')
    @if(session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
    @endif
    <form action="" method="post" enctype="multipart/form-data"class="form-horizontal">
        @csrf
        <div class="form-group">
            <label for="">Tên danh mục</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Nhập tên danh mục">
        </div>
        <div class="form-group">
            <label for="">Thuộc danh mục</label>
            <select name="parent_id" id="" class="form-control form-control-select">
                <option value="0">--- Trống ---</option>
                @foreach ($categoriesTree as $category)
                    <option value="{{$category['id']}}">{{str_repeat('---',$category['level']).' '.$category['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Slug</label>
            <input type="text" name="slug" id="" class="form-control" placeholder="Nhập slug">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="{{route('admin.category.index')}}" class="btn btn-success">Danh sách </a>
        </div>
    </form>
@endsection
