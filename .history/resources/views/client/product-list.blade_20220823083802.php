@extends('client.layouts.main')

@section('content')
    <!-- ======================= Shop Style 1 ======================== -->
    <section class="bg-cover" style="background:url({{asset('client/assets/img/banner-2.png')}}) no-repeat;">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="text-left py-5 mt-3 mb-3">
                        <h1 class="ft-medium mb-3">Sản phẩm</h1>
                        <ul class="shop_categories_list m-0 p-0">
                            @foreach ($categories as $item)
                                @if ($item->parent_id == 0)
                                    <li>
                                        <a href="{{route('product-list',['slug' => $item->slug])}}">{{$item->name}}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================= Shop Style 1 ======================== -->
    
    
    <!-- ======================= Filter Wrap Style 1 ======================== -->
    <section class="py-3 br-bottom br-top">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dánh sách sản phẩm</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================= Filter Wrap ============================== -->
    
    
    <!-- ======================= All Product List ======================== -->
    <section class="middle">
        <div class="container">
            <div class="row">
                
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 p-xl-0">
                    <div class="search-sidebar sm-sidebar border">
                        <div class="search-sidebar-body">
                        
                             <!-- Single Option -->
                             {{-- <div class="single_search_boxed">
                                <div class="widget-boxed-header">
                                    <h4><a href="#brands" data-toggle="collapse" aria-expanded="false" role="button">Danh mục</a></h4>
                                </div>
                                <div class="widget-boxed-body collapse show" id="brands" data-parent="#brands">
                                    <div class="side-list no-border">
                                        <!-- Single Filter Card -->
                                        <div class="single_filter_card">
                                            <div class="card-body pt-0">
                                                <div class="inner_widget_link">
                                                    <ul class="no-ul-list">
                                                        @foreach ($categories as $item)
                                                            <li style="margin-left:{{ 20* $item['level']}}px">
                                                                <input id="cate{{$item['id']}}" class="checkbox-custom cates" value="{{$item['id']}}" name="categories[]" type="checkbox">
                                                                <label for="cate{{$item['id']}}" class="checkbox-custom-label">{{ $item['name'] }}</label>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            
                            <!-- Single Option -->
                            <div class="single_search_boxed">
                                <div class="widget-boxed-header px-3">
                                    <h4 class="mt-3">Danh mục</h4>
                                </div>
                                <div class="widget-boxed-body">
                                    <div class="side-list no-border">
                                        <div class="filter-card" id="shop-categories">
                                            <div class="single_filter_card">
                                                <h5>
                                                    <a href="{{route('product-list')}}" class="collapsed" >
                                                        Tất cả
                                                    </a>
                                                </h5>
                                            </div>    
                                            @if (count($categories) > 0)
                                                @foreach ($categories as $item)
                                                    <!-- Single Filter Card -->
                                                    @if ($item['parent_id'] == 0)
                                                        <div class="single_filter_card">
                                                            <h5>
                                                                <a href="#{{$item['id']}}" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">
                                                                    {{$item['name']}}
                                                                    <i class="accordion-indicator ti-angle-down"></i>
                                                                </a>
                                                            </h5>
                                                            @if($item->categoryChild->count() > 0)
                                                                <div class="collapse" id="{{$item['id']}}" data-parent="#shop-categories">
                                                                    @foreach ($item->categoryChild as $cate)
                                                                        <div class="card-body">
                                                                            <div class="inner_widget_link">
                                                                                <ul>
                                                                                    <li><a href="{{route('product-list',['slug' => $cate->slug])}}">{{$cate->name}}</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach 
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{route('product-list')}} ">
                                <!-- Single Option -->
                                <div class="single_search_boxed">
                                    <div class="widget-boxed-header">
                                        <h4><a href="#size" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Kích cỡ</a></h4>
                                    </div>
                                    <div class="widget-boxed-body collapse" id="size" data-parent="#size">
                                        <div class="side-list no-border">
                                            <!-- Single Filter Card -->
                                            <div class="single_filter_card">
                                                <div class="card-body pt-0">
                                                    <div class="text-left pb-0 pt-2">
                                                        @foreach ($sizeAttrs as $item)
                                                            <div class="form-check form-option form-check-inline mb-2">
                                                                <input class="form-check-input attrs" type="checkbox" {{in_array($item->id,request()->attrs)?'checked':''}} value="{{$item->id}}" name="attrs[]" id="size{{$item->id}}" hidden>
                                                                <label class="form-option-label" for="size{{$item->id}}">{{$item->value}}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                                <!-- Single Option -->
                                <div class="single_search_boxed">
                                    <div class="widget-boxed-header">
                                        <h4><a href="#colors" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Màu sắc</a></h4>
                                    </div>
                                    <div class="widget-boxed-body collapse" id="colors" data-parent="#colors">
                                        <div class="side-list no-border">
                                            <!-- Single Filter Card -->
                                            <div class="single_filter_card">
                                                <div class="card-body pt-0">
                                                    <div class="text-left">
                                                        @foreach ($colorAttrs as $item)
                                                            <div class="form-check form-option form-check-inline mb-1">
                                                                <input class="form-check-input attrs" type="checkbox" name="attrs[]" id="color{{$item->id}}" value="{{$item->id}}" hidden>
                                                                <label class="form-option-label rounded-circle" for="color{{$item->id}}">
                                                                    <span class="form-option-color rounded-circle blc7" style="background-color: {{$item->value}}"></span>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="single_search_boxed d-flex justify-content-end">
                                    {{-- <div class="btn btn-dark my-2" data-url="{{route('product-list')}}" id="btn_filter">Lọc sản phẩm</div> --}}
                                    <button type="submit" class="btn btn-dark">Lọc sản phẩm</button>
                                </div>
                            </form>
                              <!-- Single Option Price-->
                            {{-- <div class="single_search_boxed">
                                <div class="widget-boxed-header">
                                    <h4><a href="#pricing" data-toggle="collapse" aria-expanded="false" role="button">Giá</a></h4>
                                </div>
                                <div class="widget-boxed-body collapse show" id="pricing" data-parent="#pricing">
                                    <div class="side-list no-border mb-4">
                                        <div class="rg-slider">
                                            <input type="text" class="js-range-slider" name="my_range" value="" />
                                        </div>		
                                    </div>
                                </div>
                            </div> --}}
                            
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="border mb-3 mfliud">
                                <div class="row align-items-center py-2 m-0">
                                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
                                        <h6 class="mb-0">Số lượng sản phẩm: {{$products->count()}}</h6>
                                    </div>
                                    
                                    <div class="col-xl-9 col-lg-8 col-md-7 col-sm-12">
                                        <div class="filter_wraps d-flex align-items-center justify-content-end m-start">
                                            <div class="single_fitres mr-2 br-right">
                                                <select name="filter-select-price" class="custom-select simple">
                                                    <option value="default" selected="">Mặc định</option>
                                                    <option value="asc">Lọc theo giá: Thấp đến cao</option>
                                                    <option value="desc">Lọc theo giá: Cao xuống thấp</option>
                                                </select>
                                                {{-- <select name="id_danhmuc" id="id_dm">
                                                    @foreach ($categories as $item)
                                                        <option value="{{$item['id']}}">{{str_repeat('---',$item['level']) . ' ' .$item['name']}}</option>
                                                    @endforeach
                                                </select> --}}
                                                {{-- <a href="#" id="btn_search" data-routeUrl="{{route('route')}}" data-url="{{route('product-list')}}">Tìm kiếm</a> --}}
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
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
                                        <div class="badge bg-success text-white position-absolute ft-regular ab-left text-upper">Giảm giá</div>
                                    @else
                                        <div class="badge bg-info text-white position-absolute ft-regular ab-left text-upper">Mới</div>
                                    @endif
                                    
                                    <div class="card-body p-0">
                                        <div class="shop_thumb position-relative">
                                            <a class="card-img-top d-block overflow-hidden" href="{{route('prd-detail',['slug' => $item->slug])}}">
                                                <img class="card-img-top" src="{{asset($item->feature_image)}}" alt="...">
                                            </a>
                                            <div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                                <div class="edlio">
                                                    <a href="{{route('prd-detail',['slug' => $item->slug])}}" class="text-white fs-sm ft-medium">
                                                        <i class="fas fa-eye mr-1"></i>Xem ngay
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
                    
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 text-center">
                            <a href="#" class="btn stretched-link borders m-auto"><i class="lni lni-reload mr-2"></i>Xem thêm</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- ======================= All Product List ======================== -->
    
    <!-- ======================= Customer Features ======================== -->
    <section class="px-0 py-3 br-top">
        <div class="container">
            <div class="row">
                
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="d-flex align-items-center justify-content-start py-2">
                        <div class="d_ico">
                            <i class="fas fa-shopping-basket"></i>
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
                            <i class="far fa-credit-card"></i>
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
                            <i class="fas fa-shield-alt"></i>
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
                            <i class="fas fa-headphones-alt"></i>
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


@section('scripts')
    <script>
        $(document).ready(function() {
            // const routeUrl = "http://"+location.host ;
            // const publicUrl = "http://"+location.host+"/"
            // alert(routeUrl);
            const products = $('.rows-products');
            $(document).on('click','#btn_search',function(e){
                e.preventDefault();
                const urlSearch = $(this).data('url');
                const idDm = $('#id_dm').val();

                $.ajax({
                    type: 'GET',
                    url: urlSearch,
                    data: {
                        id: idDm
                    },
                    success: function (res) {
                        let htmls = res.map(function (item) {
                            let image = item.feature_image
                            return `<div class="col-xl-3 col-lg-4 col-md-6 col-6">
                                <div class="product_grid card b-0">
                                    <div class="badge bg-success text-white position-absolute ft-regular ab-left text-upper">Mới</div>
                                    <div class="card-body p-0">
                                        <div class="shop_thumb position-relative">
                                            <a class="card-img-top d-block overflow-hidden" href="route('prd-detail',['slug' => ${item.slug}])">
                                                <img class="card-img-top" src="asset(${item.feature_image})" alt="...">
                                            </a>
                                            <div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                                <div class="edlio">
                                                    <a href="route('prd-detail',['slug' => ${item.slug}])" class="text-white fs-sm ft-medium">
                                                        <i class="fas fa-eye mr-1"></i>Xem ngay
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer b-0 p-0 pt-2 bg-white">
                                        
                                        <div class="text-left">
                                            <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1">
                                                <a href="shop-single-v1.html">${item.name}</a>
                                            </h5>
                                            <div class="elis_rty"><span class="ft-bold text-dark fs-sm">${item.price}đ</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>`
                        })
                        
                        products.html(htmls.join(' '));
                        console.log(products.innerHTML);
                    },
                    error: function (res) {
                        console.log('Lỗi');
                    }
                })

            })

            $(document).on('click', '#btn_filter',function (e) {
                e.preventDefault();
                const url = $(this).data('url');
                let cateIds = [];
                let attrIds = [];
                let cates = $(".cates:checked")
                let attrs = $(".attrs:checked")
                for (let i = 0; i < cates.length; i++) {
                    const item = cates[i];
                    cateIds.push(item.value);
                }
                for (let i = 0; i < attrs.length; i++) {
                    const item = attrs[i];
                    attrIds.push(item.value);
                }
                // console.log('attribute: ',cateIds);
                // console.log('Category: ',attrIds);

                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        cateIds: cateIds,
                        attrIds: attrIds,
                    },
                    dataType: "JSON",
                    success: function (res) {
                        console.log(res);
                    },
                    error: function (res) {
                        console.log('Lỗi');
                    }
                })
            })
        })
    </script>
@endsection