@extends ('layouts.main')

@section('content-header-title')
    Thêm thuộc tính
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
            <label for="attr">Thuộc tính</label>
            <select name="form-control form-select-control" id="attr">
                <option value="color">Màu sắc</option>
                <option value="size">Size</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Giá trị</label>
            <input type="color" name="color" id="" class="form-control">
            <input type="text" name="size" id="" placeholder="kích thước" class="form-control">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="{{route('admin.category.index')}}" class="btn btn-success">Danh sách </a>
        </div>
    </form>
@endsection
