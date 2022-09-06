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
            <label for="">Tên thuộc tính</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Nhập tên danh mục">
        </div>
        
        {{-- <div class="form-group">
            <label for="">Slug</label>
            <input type="text" name="slug" id="" class="form-control" placeholder="Nhập slug">
        </div> --}}
        <div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="{{route('admin.category.index')}}" class="btn btn-success">Danh sách </a>
        </div>
    </form>
@endsection
