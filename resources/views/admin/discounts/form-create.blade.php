@extends('admin.layouts.main')

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
            @elseif (session('err'))
                <div class="alert alert-danger" role="alert">
                    {{ session('err') }}
                </div>
            @endif
            <form action="" method="post" id="form-data" class="form">
                @csrf
                <div class="d-flex">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Mã khuyến mại</label>
                            <input class="form-control" type="text" name="name" id="code_discount"
                                value="{{ old('name') }}">
                            <span class="text-danger " id="err_name"></span>

                            @error('name')
                                <span style="color: tomato">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group p-0" >
                            <label for=""> Loại </label>
                            <select class="form-control form-select" name="type" id="discount_type">
                                <option value="0"> Loại giảm giá </option>
                                <option value="1" >Phần trăm</option>
                                <option value="2" >Tiền</option>
                            </select>
                            <span class="text-danger err_type"></span>
                            {{-- @error('type')
                                <span class="text-danger">{{$message}}</span>
                            @enderror --}}
                        </div>

                        <div>
                            <div>
                                <div class="discount_value"></div>
                            </div>
                            <div style="color: tomato" class="error_msg"></div>
                            {{-- @error('value')
                                <div style="color: tomato">
                                    {{ $message }}
                                </div>
                            @enderror --}}
                        </div>

                        <div>
                            <label for="">Ngày bắt đầu</label>
                            <input type="datetime-local" class="form-control form-control-input" name="start">
                        </div>
                        <div>
                            <label for="">Ngày kết thúc</label>
                            <input type="datetime-local" class="form-control form-control-input" name="end">
                        </div>
                    </div>

                </div>
                <div class="d-flex justify-content-start mt-3 col-12">
                    <a href="{{ route('admin.discount.index') }}" class="btn btn-success mx-2 text-white">Danh sách</a>
                    <button type="submit" class="btn btn-primary btn-submit">Thêm</button>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
       $(document).ready(function() {
        const errorMessage = $('.error_msg');
        const errorType = $('.err_type');
        const errName = $('#err_name');
        let discountValue = $('.discount_value');

        if($('#discount_type').val() == 1) {
            discountValue.html(`<label for="">Giá trị</label>
            <input class="form-control" type="text" name="value" id="percent" 
            value="{{ old('value') }}">`)
        }else if($('#discount_type').val() == 2){
            discountValue.html(`<label for="">Giá trị</label>
            <input class="form-control" type="text" name="value" id="price" 
            value="{{ old('value') }}">`)
        }else{
            discountValue.html('');
        }

        $(document).on('change','#discount_type', function() {
            
            if($(this).val() == 1) {
                errorType.html('')
                discountValue.html(`<label for="">Giá trị</label>
                <input class="form-control" type="number" name="value" id="percent" 
                value="{{ old('value') }}">`)
            }else if($(this).val() == 2){
                errorType.html('')
                discountValue.html(`<label for="">Giá trị</label>
                <input class="form-control" type="number" name="value" id="price" 
                value="{{ old('value') }}">`)
            }else{
                discountValue.html(' ');
            }
        })

        $(document).on('click','.btn-submit',function(e){
            e.preventDefault();

            if($('#code_discount').val() == '') {
                $('#err_name').html('Bạn chưa nhập mã khuyến mại')
            }else{
                $('#err_name').html('')
            }

            if($('#discount_type').val() == 0) {
                errorType.html('Bạn chưa chọn loại khuyến mại')
            }
            else if($('#discount_type').val() > 0){
                errorType.html('')
                if(($('#price') && $('#price').val() == '') || ($('#percent') && $('#percent').val() == '')) {
                    errorMessage.html('Bạn chưa nhập giá trị khuyến mại')
                }else if($('#price').val() != null || $('#percent').val() != null && $('#code_discount').val() != null){
                    $('.err_name').html('')
                    if($('#price').val() <= 0) {
                        errorMessage.html('Giá khuyến mại phải lớn hơn 0')
                    }else if($('#percent').val() < 0 || $('#percent').val() > 100) {
                        errorMessage.html('Số phần trăm phải lớn hơn 0 và nhỏ hơn hoặc bằng 100')
                    }else{
                        document.querySelector('#form-data').submit();
                    }
                }
            }
        })
       })
    </script>
@endsection
