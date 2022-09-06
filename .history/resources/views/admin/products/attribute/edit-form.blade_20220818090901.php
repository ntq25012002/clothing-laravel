@extends ('layouts.main')

@section('css')
    <style>
        .attr{
            display: none;
        }
        .attr.active {
            display: block;
        }
        #input-color {
            width: 38px;
            height: 38px;
            padding: 0;
            display: block;
            border: none;
        }
    </style>
@endsection

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
                    <option value="">Thuộc tính</option>
                    <option value="color" {{$attr->name == 'color' ? 'selected':''}}>Màu sắc</option>
                    <option value="size" {{$attr->name == 'size' ? 'selected':''}}>Kích thước</option>
                </select>
            </div>
            <div class="form-group attr {{$attr->name == 'color' ? 'active' : ''}} " id="color" >
                <label for="">Giá trị</label>
                <input type="color" id="favcolor" name="favcolor" value="{{$attr->value != '' ? $attr->value : ''}} ">
                <input type="color" name="color" value="{{$attr->value != '' ? $attr->value : ''}} "id="input-color" >
            </div>
            <div class="form-group attr {{$attr->name == 'size' ? 'active':''}}" id="size">
                <label for="">Giá trị</label>
                <input type="text" name="size" value="{{$attr->value != '' ? $attr->value : ''}}" id="input-size"placeholder="Kích thước" class="form-control">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Thêm</button>
                <a href="{{route('admin.attribute.index')}}" class="btn btn-success">Danh sách </a>
            </div>
        </form>
    </div>
   </div>
@endsection

@section('page-script')
   
   <script>
        $(document).ready(function() {
            $(document).on('change','#attr',function() {
                if($(this).val() == 'color') {
                    $('#size').removeClass('active')
                    $('#color').addClass('active')
                }else if($(this).val() == 'size') {
                    $('#color').removeClass('active')
                    $('#size').addClass('active')
                }else{
                    $('#size').removeClass('active')
                    $('#color').removeClass('active')
                }
            })
        })
   </script>
@endsection
