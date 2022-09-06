@extends('layouts.main')

@section('css')
    <style>
        .hidden{
            display:none
        }
        .active{
            display: block;
        }
    </style>
@endsection

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
            <form action="" method="post" class="form">
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

                        <div class="form-group p-0" >
                            <label for=""> Loại </label>
                            <select class="form-control form-select" name="type" id="discount_type">
                                <option value=""> Loại giảm giá </option>
                                <option value="0" >Phần trăm</option>
                                <option value="1" >Tiền</option>
                            </select>
                            @error('type')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="discount_value">
                            <div>
                                <label for="">Giá trị</label>
                            <input class="form-control" type="text" name="value" id=""
                                value="{{ old('value') }}">
                            </div>
                            @error('value')
                                <div style="color: tomato">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- <div class="discount_value hidden">
                            <label for="">Giá trị</label>
                            <input class="form-control" type="text" name="value_price" id=""
                                value="{{ old('value_price') }}">
                            @error('value_price')
                                <div style="color: tomato">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}

                    </div>

                </div>
                <div class="d-flex justify-content-start mt-3 col-12">
                    <a href="{{ route('admin.discount.index') }}" class="btn btn-success mx-2 text-white">Danh sách</a>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
       $(document).ready(function() {
        $(document).on('change','#discount_type', function() {
            // if($(this).val() == 0) {
                console.log($('.discount_value')[$(this).val()]);
            // }
            // .removeClass('hidden')
            // $('.discount_value')[$(this).val()].addClass('active')
            // console.log(123);
        })
       })
    </script>
@endsection
