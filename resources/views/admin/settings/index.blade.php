{{-- <h3>Thêm sinh viên mới</h3> --}}

@extends('admin.layouts.main')

@section('content-header-title')
    <h3>Cài đặt</h3>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- {{dd($settings)}} --}}
            @if (session('msg'))
                <div class="alert alert-success" role="alert">
                    {{ session('msg') }}
                </div>
            @endif
            <form action="" method="post" enctype="multipart/form-data" class="form ">
                @csrf
                <div class="row">

                    {{-- <div class=" "> --}}
                        @foreach ($settings as $setting)
                            <input type="number" name="ids[]" id="" value="{{$setting->id}}" hidden />
                            @if ($setting['config_key'] == 'logo')
                                <div class="form-group col-md-6">
                                    <label for="logo" class="control-label">{{$setting['config_key']}}</label>

                                    <input type="file" name="{{$setting['config_key']}}" id="{{$setting['config_key']}}" class="form-control-file form-control border-0 px-0" 
                                    {{$setting['config_value'] != '' ? 'hidden' : ''}}>

                                    <label for="{{$setting['config_key']}}">
                                        <img src="{{$setting['config_value']}}" alt="" height="70px">
                                    </label>
                                </div>
                            @else
                            
                                <div class="form-group col-md-6 ">
                                    <label class="control-label" for="">{{$setting['config_key']}}</label>
                                    <input type="text" class="form-control" name="{{$setting['config_key']}}" id="" value="{{old($setting['config_key']) ?? $setting['config_value']}}" placeholder="Nhập link {{$setting['config_key']}}">
                                </div>
                            @endif
                        @endforeach

{{-- 
                        <div class="form-group ">
                            <label class="control-label" for="">Instagram</label>
                            <input type="text" class="form-control" name="instagram" id="" value="{{old('instagram') ?? $settings['instagram']}}" placeholder="Nhập link instagram">
                        </div>
                        <div class="form-group ">
                            <label class="control-label" for="">Twitter</label>
                            <input type="text" class="form-control" name="twitter" id="" value="{{old('twitter') ?? $settings['twitter']}}" placeholder="Nhập link twitter">
                        </div>
                        <div class="form-group ">
                            <label class="control-label" for="">Telegram</label>
                            <input type="text" class="form-control" name="telegram" id="" value="{{old('telegram') ?? $settings['telegram']}}" placeholder="Nhập link telegram">
                        </div>
                        
                        <div class="form-group ">
                            <label class="control-label" for="">TikTok</label>
                            <input type="text" class="form-control" name="tiktok" id="" value="{{old('tiktok') ?? $settings['tiktok']}}" placeholder="Nhập link tiktok">
                        </div> --}}
                        
                    </div>

                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="logo" class="control-label">Logo</label>
                            <input type="file" name="logo" id="" class="form-control-file form-control border-0 px-0">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Email</label>
                            <input type="email" name="email" id="" class="form-control " value="{{old('email') ?? $settings['email']}}" placeholder="Nhập email liên hệ"/>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Số điện thoại</label>
                            <input type="text" name="phone_number" class="form-control "id="" value="{{old('phone_number') ?? $settings['phone_number']}}" placeholder="Nhập số điện thoại liên hệ">
                        </div>
                        <div class="form-group" class="control-label">
                            <label for="">Địa chỉ</label>
                            <input type="text" name="address" id="" class="form-control " value="{{old('address') ?? $settings['address']}}" placeholder="Nhập địa chỉ">
                        </div>
                    </div> --}}
                {{-- </div> --}}

                <div class="d-flex justify-content-end mt-3 px-0 col-md-12">
                    <button type="submit" name="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>
                
                
            </form>
        </div>
    </div>
@endsection

@section('page-script')
    
@endsection

