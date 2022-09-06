@extends('client.layouts.main')

@section('css')
    <style>
        .form-option-color{
            border-radius: 50%;
        }
    </style>
@endsection
@section('home-slider')
    <div class="home-slider margin-bottom-0">
        <!-- Slide -->
        @foreach ($sliders as $slider)
            <div data-background-image="{{asset($slider->image_path)}}" class="item">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="home-slider-container">

                                <!-- Slide Title -->
                                <div class="home-slider-desc">
                                    <div class="home-slider-title mb-4">
                                        <h5 class="theme-cl fs-sm ft-ragular mb-0">Bộ sưu tập</h5>
                                        <h1 class="mb-1 ft-bold lg-heading" style="width:50%">{{$slider->title}}</h1>
                                        <span class="trending">{{$slider->description}}</span>
                                    </div>

                                    <a href="#" class="btn stretched-link borders">Xem ngay<i class="lni lni-arrow-right ml-2"></i></a>
                                </div>
                                <!-- Slide Title / End -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
@endsection

@section('content')
<section class="middle">
    <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center">
                    <h2 class="off_title">Trendy Products</h2>
                    <h3 class="ft-bold pt-3">Sản phẩm mới</h3>
                </div>
            </div>
        </div>
        
        <!-- row -->
        <div class="row align-items-center rows-products">
            @foreach ($products as $item)
                <!-- Single -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                    <div class="product_grid card b-0">
                        @if ($item->promotional_price > 0) 
                            <div class="badge bg-success text-white position-absolute ft-regular ab-left text-upper">Sale</div>
                        @else
                            <div class="badge bg-info text-white position-absolute ft-regular ab-left text-upper">New</div>
                        @endif
                        
                        <div class="card-body p-0">
                            <div class="shop_thumb position-relative">
                                <a class="card-img-top d-block overflow-hidden" href="{{route('prd-detail',['slug' => $item->slug])}}">
                                    <img class="card-img-top" src="{{asset($item->feature_image)}}" alt="...">
                                </a>
                                <div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                    <div class="edlio">
                                        <a data-url="{{route('add-to-cart',['id' => $item->id])}}" data-prd_id="{{$item->id}}" class="add-to-cart text-white fs-sm ft-medium">
                                            <i class="lni lni-shopping-basket mr-1"></i>Thêm vào giỏ hàng
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer b-0 p-0 pt-2 bg-white">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="text-left">
                                    @foreach ($item->attributes as $itemAttr)
                                        @if ($itemAttr->name == 'color')
                                            <div class="form-check form-option form-check-inline mb-1">
                                                <label class="form-option-label small rounded-circle" for="color{{$itemAttr->id}}"><span class="form-option-color " style="background-color:{{$itemAttr->value}}"></span></label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="text-right">
                                    <button class="btn auto btn_love snackbar-wishlist"><i class="far fa-heart"></i></button> 
                                </div>
                            </div>
                            <div class="text-left">
                                <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1">
                                    <a href="shop-single-v1.html">{{$item->name}}</a>
                                </h5>
                                <div class="elis_rty"><span class="ft-bold text-dark fs-sm">{{number_format($item->price,'0',',','.')}}đ</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                
            @endforeach
            
        </div>
        <!-- row -->
        
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="position-relative text-center">
                    <a href="shop-style-1.html" class="btn stretched-link borders">Xem thêm<i class="lni lni-arrow-right ml-2"></i></a>
                </div>
            </div>
        </div>
        
    </div>
</section>

<section class="gray">
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center">
                    <h2 class="off_title">Testimonials</h2>
                    <h3 class="ft-bold pt-3">Client Reviews</h3>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12">
                <div class="reviews-slide px-3">
                    
                    <!-- single review -->
                    <div class="single_review">
                        <div class="sng_rev_thumb"><figure><img src="{{asset('client/assets/img/team-1.jpg')}}" class="img-fluid circle" alt="" /></figure></div>
                        <div class="sng_rev_caption text-center">
                            <div class="rev_desc mb-4">
                                <p class="fs-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                            </div>
                            <div class="rev_author">
                                <h4 class="mb-0">Mark Jevenue</h4>
                                <span class="fs-sm">CEO of Addle</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- single review -->
                    <div class="single_review">
                        <div class="sng_rev_thumb"><figure><img src="{{asset('client/assets/img/team-2.jpg')}}" class="img-fluid circle" alt="" /></figure></div>
                        <div class="sng_rev_caption text-center">
                            <div class="rev_desc mb-4">
                                <p class="fs-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                            </div>
                            <div class="rev_author">
                                <h4 class="mb-0">Henna Bajaj</h4>
                                <span class="fs-sm">Aqua Founder</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- single review -->
                    <div class="single_review">
                        <div class="sng_rev_thumb"><figure><img src="{{asset('client/assets/img/team-3.jpg')}}" class="img-fluid circle" alt="" /></figure></div>
                        <div class="sng_rev_caption text-center">
                            <div class="rev_desc mb-4">
                                <p class="fs-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                            </div>
                            <div class="rev_author">
                                <h4 class="mb-0">John Cenna</h4>
                                <span class="fs-sm">CEO of Plike</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- single review -->
                    <div class="single_review">
                        <div class="sng_rev_thumb"><figure><img src="{{asset('client/assets/img/team-4.jpg')}}" class="img-fluid circle" alt="" /></figure></div>
                        <div class="sng_rev_caption text-center">
                            <div class="rev_desc mb-4">
                                <p class="fs-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                            </div>
                            <div class="rev_author">
                                <h4 class="mb-0">Madhu Sharma</h4>
                                <span class="fs-sm">Team Manager</span>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<section class="p-0">
    <div class="container-fluid p-0">
        
        <div class="row no-gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center">
                    <h2 class="off_title">Instagram Gallery</h2>
                    <span class="fs-lg ft-bold theme-cl pt-3">@mahak_71</span>
                    <h3 class="ft-bold lh-1">From Instagram</h3>
                </div>
            </div>
        </div>
        
        <div class="row no-gutters">
            
            <div class="col">
                <div class="_insta_wrap">
                    <div class="_insta_thumb">
                        <a href="javascript:void(0);" class="d-block"><img src="{{asset('client/assets/img/i-1.png')}}" class="img-fluid" alt="" /></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="_insta_wrap">
                    <div class="_insta_thumb">
                        <a href="javascript:void(0);" class="d-block"><img src="{{asset('client/assets/img/i-2.png')}}" class="img-fluid" alt="" /></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="_insta_wrap">
                    <div class="_insta_thumb">
                        <a href="javascript:void(0);" class="d-block"><img src="{{asset('client/assets/img/i-3.png')}}" class="img-fluid" alt="" /></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="_insta_wrap">
                    <div class="_insta_thumb">
                        <a href="javascript:void(0);" class="d-block"><img src="{{asset('client/assets/img/i-7.png')}}" class="img-fluid" alt="" /></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="_insta_wrap">
                    <div class="_insta_thumb">
                        <a href="javascript:void(0);" class="d-block"><img src="{{asset('client/assets/img/i-8.png')}}" class="img-fluid" alt="" /></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="_insta_wrap">
                    <div class="_insta_thumb">
                        <a href="javascript:void(0);" class="d-block"><img src="{{asset('client/assets/img/i-4.png')}}" class="img-fluid" alt="" /></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="_insta_wrap">
                    <div class="_insta_thumb">
                        <a href="javascript:void(0);" class="d-block"><img src="{{asset('client/assets/img/i-5.png')}}" class="img-fluid" alt="" /></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="_insta_wrap">
                    <div class="_insta_thumb">
                        <a href="javascript:void(0);" class="d-block"><img src="{{asset('client/assets/img/i-6.png')}}" class="img-fluid" alt="" /></a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
</section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // $('.add-to-cart');
            $(document).on('click','.add-to-cart',function(e) {
                e.preventDefault();
                const url = $(this).data('url');
                const prdId = $(this).data('prd_id');
                console.log(url,prdId);
                $.ajax({
                    method: 'get',
                    url: url,
                    // data: {
                    //     id: prdId
                    // },
                    // dataType: 'JSON',
                    success: function(response) {
                        console.log('xong');
                    },
                    error: function(response) {
                        console.log('lỗi');
                    }
                })
            })
        })
    </script>
@endsection