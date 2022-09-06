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
            <form action="" method="post" id="form-data" class="form">
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
                                <div class="discount_value">
                                    
                                </div>
                            </div>
                            <div style="color: tomato" class="error_msg">
                                
                            </div>
                            {{-- @error('value')
                                <div style="color: tomato">
                                    {{ $message }}
                                </div>
                            @enderror --}}
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
        let discountValue = $('.discount_value');
        console.log(typeof $('#discount_type').val());
        // if($('#discount_type').val() == 1) {
        //     discountValue.html(`<label for="">Giá trị</label>
        //     <input class="form-control" type="text" name="value" id="percent" 
        //     value="{{ old('value') }}">`)
        // }else if($('#discount_type').val() == 2){
        //     discountValue.html(`<label for="">Giá trị</label>
        //     <input class="form-control" type="text" name="value" id="price" 
        //     value="{{ old('value') }}">`)
        // }else if($('#discount_type').val() == null){
        //     discountValue.removeChild();
        // }

        $(document).on('change','#discount_type', function() {
            if($(this).val() == 1) {
                discountValue.html(`<label for="">Giá trị</label>
                <input class="form-control" type="text" name="value" id="percent" 
                value="{{ old('value') }}">`)
            }else if($(this).val() == 2){
                discountValue.html(`<label for="">Giá trị</label>
                <input class="form-control" type="text" name="value" id="price" 
                value="{{ old('value') }}">`)
            }else{
                discountValue.html(' ');
            }
        })

        $(document).on('click','.btn-submit',function(e){
            e.preventDefault();

            if(!$('#price') && !$('#percent')) {
                errorType.html('Bạn chưa chọn loại khuyến mại')
            }
            if($('#price') && $('#price').val() == '') {
                errorMessage.html('Bạn chưa nhập giá trị khuyến mại')
            }
            else if($('#percent') && $('#percent').val() == '') {
                errorMessage.html('Bạn chưa nhập giá trị khuyến mại')
            }else if($('#price').val() != null || $('#percent').val() != null){
                document.querySelector('#form-data').submit();
            }

        })
       })
    </script>
@endsection
