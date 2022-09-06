{{-- <h3>Thêm sinh viên mới</h3> --}}

@extends('layouts.main')

@section('content-header-title')
    <h3>Thêm người dùng</h3>
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
                {{-- <input class="form-control" type="hidden" name="_token" id="" value="{{ csrf_token() }}"> --}}
                <div class="d-flex">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Họ và tên</label>
                            <input class="form-control" type="text" name="name" id=""
                                value="{{ old('name') }}">
                            @error('name')
                                <span style="color: tomato">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class=" d-flex">
                            <div class="form-group col-sm-6 p-0">
                                <label for="">Avatar</label>
                                <input id="formFile" type="file" onchange="previewImage()"
                                    name="avatar" value="{{ old('avatar') }}">
                                <div>
                                    <img src="" id="img-preview" alt="" style="width:90px">
                                </div>
                                @error('avatar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-3 ">
                                <label for="role_id">Vai trò</label>
                                <select class="form-control form-select select2_init" name="role_ids[]" id="role_id" multiple="multiple">
                                    <option value=""></option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role['id'] }}"
                                            {{ $role['id'] == old('role_ids') ? 'selected' : '' }}>{{ $role['display_name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_ids')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="form-group col-sm-3 p-0" >
                                <label for=""> Giới tính </label>
                                <select class="form-control form-select" name="gender" id="">
                                    <option value=""> Giới tính </option>
                                    <option value="2" >Nam</option>
                                    <option value="1" >Nữ</option>
                                    <option value="0" >Khác</option>
                                </select>
                                @error('role_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div> --}}
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

                    <div class="col-sm-6">


                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input class="form-control" type="password" name="password" id=""
                                value="{{ old('password') }}">
                            @error('password')
                                <div style="color: tomato">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="">Xác nhận mật khẩu</label>
                            {{-- <input class="form-control" type="password" name="password_confirmation " id=""
                                value="{{ old('password_confirmation') }}"> --}}
                            <input id="password" type="password" name="password_confirmation" class="form-control" type="password" value="{{old('password_confirmation')}}">
                            @error('password_confirmation')
                                <div style="color: tomato">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="d-flex justify-content-start mt-3 col-12">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-success mx-2 text-white">Danh sách</a>
                    <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        const img = document.getElementById('formFile');
        // img.onchange = previewImage()
        function previewImage() {
            const file = img.files[0];
            const preview = document.getElementById('img-preview');
            console.log(preview);
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                console.log(reader.result);
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        $('.select2_init').select2({
            'placeholder': 'Chọn vai trò'
        });
    </script>
@endsection
