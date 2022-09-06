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
            </div>
            
            <div class="row justify-content-between">
                <div class="col-12 col-lg-7 col-md-12">
                    <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x mb-4">
                        @foreach (session()->get('myCart') as $item)
                            <li class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <!-- Image -->
                                        <a href="product.html"><img src="{{asset($item['image'])}}" alt="..." class="img-fluid"></a>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-between">
                                        <div class="cart_single_caption pl-2">
                                            <h4 class="product_title fs-md ft-medium mb-1 lh-1">{{$item['name']}}</h4>
                                            <p class="mb-1 lh-1"><span class="text-dark">Kích cỡ: {{$item['size']}}</span></p>
                                            <p class="mb-3 lh-1"><span class="text-dark">Màu: <span style="background-color:{{$item['color']}}; width:18px;height:18px; display:inline-block"></span></span></p>
                                            <h4 class="fs-md ft-medium mb-3 lh-1">{{number_format($item['price'],'0',',','.')}} đ</h4>
                                            <div class="col-12 px-0 col-lg-auto">
                                                <input type="number" name="quantity" class="mb-2 custom-input" value="{{$item['quantity']}}" min="0" step="1" >
                                            </div>
                                        </div>
                                        <div class="fls_last"><button class="close_slide gray" data-prd_id = "{{$item['id']}}"><i class="ti-close"></i></button></div>
                                    </div>
                                </div>
                            </li>
                        @endforeach 
                        
                    </ul>
                    
                    <div class="row align-items-end justify-content-between mb-10 mb-md-0">
                        <div class="col-12 col-md-7">
                            <!-- Coupon -->
                            <form class="mb-7 mb-md-0">
                                <label class="fs-sm ft-medium text-dark">Mã giảm giá:</label>
                                <div class="row form-row">
                                    <div class="col">
                                        <input class="form-control" type="text" placeholder="Nhập mã giảm giá*">
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-dark" type="submit">Áp dụng</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-md-auto mfliud">
                            <button class="btn stretched-link borders">Cập nhật giỏ hàng</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card mb-4 gray mfliud">
                        <div class="card-body">
                        <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                            <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                <span>Tổng</span> <span class="ml-auto text-dark ft-medium">{{number_format(session()->get('total'),'0',',','.')}} đ</span>
                            </li>
                            <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                <span>Khuyến mãi</span> <span class="ml-auto text-dark ft-medium">$10.10</span>
                            </li>
                            <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                <span>Tổng tiền</span> <span class="ml-auto text-dark ft-medium">{{number_format(session()->get('total'),'0',',','.')}} đ</span>
                            </li>
                            {{-- <li class="list-group-item fs-sm text-center">
                                Shipping cost calculated at Checkout *
                            </li> --}}
                        </ul>
                        </div>
                    </div>
                    
                    <a class="btn btn-block btn-dark mb-3" href="checkout.html">Đặt hàng</a>
                    
                    <a class="btn-link text-dark ft-medium" href="shop.html">
                        <i class="ti-back-left mr-2"></i> Tiếp tục mua sắm
                    </a>
                </div>
                
            </div>
            
        </div>
    </section>
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
                            <h5 class="mb-0">Free Shipping</h5>
                            <span class="text-muted">Capped at $10 per order</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="d-flex align-items-center justify-content-start py-2">
                        <div class="d_ico">
                            <i class="far fa-credit-card theme-cl"></i>
                        </div>
                        <div class="d_capt">
                            <h5 class="mb-0">Secure Payments</h5>
                            <span class="text-muted">Up to 6 months installments</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="d-flex align-items-center justify-content-start py-2">
                        <div class="d_ico">
                            <i class="fas fa-shield-alt theme-cl"></i>
                        </div>
                        <div class="d_capt">
                            <h5 class="mb-0">15-Days Returns</h5>
                            <span class="text-muted">Shop with fully confidence</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="d-flex align-items-center justify-content-start py-2">
                        <div class="d_ico">
                            <i class="fas fa-headphones-alt theme-cl"></i>
                        </div>
                        <div class="d_capt">
                            <h5 class="mb-0">24x7 Fully Support</h5>
                            <span class="text-muted">Get friendly support</span>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </section>
    <!-- ======================= Customer Features ======================== -->
    
@endsection