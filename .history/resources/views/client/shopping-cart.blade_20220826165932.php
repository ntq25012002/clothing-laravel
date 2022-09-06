@extends('client.layouts.main')

@section('css')
    <style>
        .custom-input{
            min-width:70px;
            height: 52px;
            line-height: 1.5;
            padding: 0.875rem 1rem 0.875rem 1rem;
            border: 1px solid #e5e5e5;
            border-radius: 0;
            color: #868e96;
        }
        .top-menu-breadcrubms {
            margin-top: 67px;
        }
        .btn{
            padding: 15px 25px;
        }
        .btn-close {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')

    <!-- ======================= Top Breadcrubms ======================== -->
    <div class="gray py-3 top-menu-breadcrubms">
        <div class="container">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                            {{-- <li class="breadcrumb-item"><a href="#">Support</a></li> --}}
                            <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Top Breadcrubms ======================== -->
    
    <!-- ======================= Product Detail ======================== -->
    <section class="middle">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="text-center d-block mb-5">
                        <h2>Giỏ hàng</h2>
                    </div>
                </div>
                @if(session('msg'))
                    <div class="alert alert-success pull-right">
                        {{session('msg')}}
                        <span class="ml-5 btn-close" onclick="close()">&#10005;</span>
                    </div>
                @endif
            </div>
            
            <div class="row justify-content-between">
                <div class="col-12 col-lg-7 col-md-12">
                    @if (session('myCart') && count(session('myCart')) > 0)
                        <form action="{{route('update-cart')}}" method="post" id="form-update">
                            @csrf
                            {{-- @if (session()->get('myCart')->count() > 0) --}}
                                <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x mb-4">
                                    @foreach (session()->get('myCart') as $key => $item)
                                        <li class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col-3">
                                                    <a href="#"><img src="{{asset($item['image'])}}" alt="..." class="img-fluid"></a>
                                                </div>
                                                <div class="col d-flex align-items-center justify-content-between">
                                                    <div class="cart_single_caption pl-2">
                                                        <h4 class="product_title fs-md ft-medium mb-1 lh-1">{{$item['name']}}</h4>
                                                        <p class="mb-1 lh-1"><span class="text-dark">Kích cỡ: {{$item['size']}}</span></p>
                                                        <p class="mb-3 lh-1"><span class="text-dark">Màu: <span style="background-color:{{$item['color']}};margin-bottom:-3px; width:14px;height:14px; display:inline-block"></span></span></p>
                                                        <h4 class="fs-md ft-medium mb-3 lh-1">{{number_format($item['price'],'0',',','.')}} đ</h4>
                                                        <div class="col-12 px-0 col-lg-auto">
                                                            {{-- <input type="number" name="cart_id{{$key}}" value="{{$key}}" id="" hidden> --}}
                                                            <input type="number" name="{{$key}}" class="mb-2 custom-input" value="{{$item['quantity']}}" min="1" step="1" >
                                                        </div>
                                                    </div>
                                                    <div class="fls_last"><button class="close_slide gray remove_shopping_cart_item" data-url_delete="{{route('remove-cart-item',['id' => $key , 'idPrd' => $item['id'] ])}}"><i class="ti-close"></i></button></div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach 
                                </ul>
                            {{-- @endif --}}
                        </form>
                    @else 
                        <h4 class="text-center text-info mb-5">Giỏ hàng trống</h4>
                    @endif
                    
                    <div class="row align-items-end justify-content-between mb-10 mb-md-0">
                        <div class="col-12 col-md-7">
                            <!-- Coupon -->
                            <form class="mb-7 mb-md-0">
                                <label class="fs-sm ft-medium text-dark">Mã giảm giá:</label>
                                <div class="row form-row">
                                    <div class="col">
                                        <input class="form-control" name="discount" type="text" placeholder="Nhập mã giảm giá" value="{{session()->get('codeDisc')}}">
                                        {{dd(session()->get('codeDisc'))}}
                                        <span class="message-error text-danger"></span>
                                        <span class="message-success text-success"></span>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-dark" id="btn-apply-discount" data-total="{{number_format(session()->get('total'),'0',',','.') . ' đ'}}" data-url="{{route('update-cart')}}" type="submit">Áp dụng</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-md-auto mfliud">
                            <button class="btn stretched-link borders btn-update-cart" >Cập nhật giỏ hàng</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card mb-4 gray mfliud">
                        <div class="card-body">
                        <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                            <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                <span>Tổng</span> <span class="ml-auto text-dark ft-medium total-prev">{{number_format(session()->get('total'),'0',',','.')}} đ</span>
                            </li>
                            <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                {{-- {{dd(session()->get('discount')['value'])}} --}}
                                <span>Khuyến mãi</span> <span class="ml-auto text-dark ft-medium" id="discount">
                                    @if (!empty(session()->get('discount')))
                                        @if (session()->get('discount')['type'] == 1)
                                            {{session()->get('discount')['value']}} %
                                        @elseif (session()->get('discount')['type'] == 2)
                                            {{session()->get('discount')['value']}} đ

                                        @endif
                                    @else
                                        0
                                    @endif
                                </span>
                            </li>
                            <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                <span>Tổng tiền</span> 
                                <span class="ml-auto text-dark ft-medium total-after">
                                    @if (!empty(session()->get('discount')))
                                        @if (session()->get('discount')['type'] == 1)
                                            {{number_format(session()->get('total') - session()->get('total')*session()->get('discount')['value']/100,'0',',','.')}} đ
                                        @elseif (session()->get('discount')['type'] == 2)
                                            {{number_format(session()->get('total') - session()->get('discount')['value'],'0',',','.')}} đ

                                        @endif
                                    @else
                                        {{number_format(session()->get('total'),'0',',','.')}} đ
                                    @endif
                                </span>
                            </li>
                            
                        </ul>
                        </div>
                    </div>
                    
                    <a class="btn btn-block btn-dark mb-3" data-discount="" href="{{route('checkout')}}">Đặt hàng</a>
                    
                    <a class="btn-link text-dark ft-medium" href="{{route('product-list')}}">
                        <i class="ti-back-left mr-2"></i> Tiếp tục mua sắm
                    </a>
                </div>
                
            </div>
            
        </div>
    </section>
    {{-- {{dd(session('discount'))}} --}}
    <!-- ======================= Product Detail End ======================== -->
    
    <!-- ============================= Customer Features =============================== -->
    <section class="px-0 py-3 br-top">
        <div class="container">
            <div class="row">
                
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="d-flex align-items-center justify-content-start py-2">
                        <div class="d_ico">
                            <i class="fas fa-shopping-basket theme-cl"></i>
                        </div>
                        <div class="d_capt">
                            <h5 class="mb-0">Miễn phí vận chuyển</h5>
                            <span class="text-muted">Mức đơn hàng trên 500.000đ</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="d-flex align-items-center justify-content-start py-2">
                        <div class="d_ico">
                            <i class="far fa-credit-card theme-cl"></i>
                        </div>
                        <div class="d_capt">
                            <h5 class="mb-0">
                                THANH TOÁN AN TOÀN</h5>
                            <span class="text-muted">Trả góp lên đến 6 tháng</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="d-flex align-items-center justify-content-start py-2">
                        <div class="d_ico">
                            <i class="fas fa-shield-alt theme-cl"></i>
                        </div>
                        <div class="d_capt">
                            <h5 class="mb-0">TRẢ HÀNG TRONG VÒNG 15 NGÀY</h5>
                            <span class="text-muted">Mua sắm với sự tự tin hoàn toàn</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="d-flex align-items-center justify-content-start py-2">
                        <div class="d_ico">
                            <i class="fas fa-headphones-alt theme-cl"></i>
                        </div>
                        <div class="d_capt">
                            <h5 class="mb-0">HỖ TRỢ 24/7</h5>
                            <span class="text-muted">Nhận hỗ trợ thân thiện</span>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </section>
    <!-- ======================= Customer Features ======================== -->
@endsection

@section('scripts')
    <script>
        function openCart() {

        }
        $(document).ready(function() {
            $(document).on('click','.btn-close',function(e) {
                $(this).parent().remove();
            })
            $(document).on('click','#btn-apply-discount',function(e) {
                e.preventDefault();
                // console.log(1);
                const url = $(this).data('url');
                const discount = $('input[name="discount"]');
                const token = $('meta[name="_token"]').attr('content');
                const total = $(this).data('total');
                let msgErr = $('.message-error');
                let msgSuccess = $('.message-success');
                if(discount.val().trim() == '') {
                    msgErr.html('Bạn chưa nhập mã khuyến mại');
                }else{
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            discount: discount.val(),
                            _token: token
                        },
                        success: function (res) {
                            if(res.status == 200) {
                                msgErr.html('');
                                msgSuccess.html(res.message);
                                $('.total-after').html(res.total + 'đ');
                                if(res.type == 1) {
                                    $('#discount').html(res.value + '%')
                                }else if(res.type == 2) {
                                    $('#discount').html(res.value + 'đ')
                                }
                                discount.disabled = true;
                            }
                            else if(res.status == 500) {
                                msgSuccess.html('');
                                msgErr.html(res.message);
                                $('#discount').html(0)
                                $('.total-after').html(total);
                            }

                        },
                        error: function (res) {
                            console.log('Lỗi');
                        }
                    })
                }
            })
        })
        
    </script>
@endsection