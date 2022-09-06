{{-- <h3>Thêm sinh viên mới</h3> --}}

@extends('layouts.main')

@section('content-header-title')
    <h3>Tạo mã giảm giá</h3>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">

            @if (session('msg'))
                <div class="alert alert-success" role="alert">
                    {{ session('msg') }}
                </div>
            @endif
            <form action="" method="post" enctype="multipart/form-data" class="form">
                @csrf
                <div class="d-flex">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tên</label>
                            <input class="form-control" type="text" name="name" id=""
                                value="{{ old('name') }}">
                            @error('name')
                                <span style="color: tomato">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div>
                            <label for="">Email</label>
                            <input class="form-control" type="email" name="email" id=""
                                value="{{ old('email') }}">
                            @error('email')
                                <div style="color: tomato">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                    </div>

                </div>
                <div class="d-flex justify-content-start mt-3 col-12">
                    <a href="{{ route('admin.discount.index') }}" class="btn btn-success mx-2 text-white">Danh sách</a>
                    <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
       
    </script>
@endsection
