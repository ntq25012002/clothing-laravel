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
   <div class="card">
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data"class="form-horizontal col-md-6">
            @csrf
            <div class="form-group">
                <label for="attr">Thuộc tính</label>
                <select class="form-control form-select-control" name="attr" id="attr">
                    <option value="color">Màu sắc</option>
                    <option value="size">Size</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Giá trị</label>
                <input type="color" name="color" id="" width="68px" style="display:block; border:none">
            </div>
            <div class="form-group">
                <label for="">Giá trị</label>
                <input type="text" name="size" id="" placeholder="Kích thước" class="form-control">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Thêm</button>
                <a href="{{route('admin.category.index')}}" class="btn btn-success">Danh sách </a>
            </div>
        </form>
    </div>
   </div>
@endsection

@section('page-script')
   
   <script>
        $(document).ready(function() {
            $(document).on('change','#attr',function() {
                console.log(100000);
            })
        })
   </script>
@endsection
