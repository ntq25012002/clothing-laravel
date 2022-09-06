@extends('client.layouts.main')

@section('content')
    <!-- ======================= Shop Style 1 ======================== -->
    <section class="bg-cover" style="background:url({{asset('client/assets/img/banner-2.png')}}) no-repeat;">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="text-left py-5 mt-3 mb-3">
                        <h1 class="ft-medium mb-3">Shop</h1>
                        <ul class="shop_categories_list m-0 p-0">
                            <li><a href="#">Men</a></li>
                            <li><a href="#">Speakers</a></li>
                            <li><a href="#">Women</a></li>
                            <li><a href="#">Accessories</a></li>
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
                             <div class="single_search_boxed">
                                <div class="widget-boxed-header">
                                    <h4><a href="#brands" data-toggle="collapse" aria-expanded="false" role="button">Brands</a></h4>
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
                                                                <input id="cate{{$item['id']}}" class="checkbox-custom" name="categories[]" type="checkbox">
                                                                <label for="cate{{$item['id']}}" class="checkbox-custom-label">{{ $item['name'] }}<span>142</span></label>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Single Option -->
                            <div class="single_search_boxed">
                                <div class="widget-boxed-header">
                                    <h4><a href="#pricing" data-toggle="collapse" aria-expanded="false" role="button">Pricing</a></h4>
                                </div>
                                <div class="widget-boxed-body collapse show" id="pricing" data-parent="#pricing">
                                    <div class="side-list no-border mb-4">
                                        <div class="rg-slider">
                                            <input type="text" class="js-range-slider" name="my_range" value="" />
                                        </div>		
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Single Option -->
                            <div class="single_search_boxed">
                                <div class="widget-boxed-header">
                                    <h4><a href="#size" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Size</a></h4>
                                </div>
                                <div class="widget-boxed-body collapse" id="size" data-parent="#size">
                                    <div class="side-list no-border">
                                        <!-- Single Filter Card -->
                                        <div class="single_filter_card">
                                            <div class="card-body pt-0">
                                                <div class="text-left pb-0 pt-2">
                                                    <div class="form-check form-option form-check-inline mb-2">
                                                        <input class="form-check-input" type="radio" name="sizes" id="26s">
                                                        <label class="form-option-label" for="26s">26</label>
                                                    </div>
                                                    <div class="form-check form-option form-check-inline mb-2">
                                                        <input class="form-check-input" type="radio" name="sizes" id="28s">
                                                        <label class="form-option-label" for="28s">28</label>
                                                    </div>
                                                    <div class="form-check form-option form-check-inline mb-2">
                                                        <input class="form-check-input" type="radio" name="sizes" id="30s" checked>
                                                        <label class="form-option-label" for="30s">30</label>
                                                    </div>
                                                    <div class="form-check form-option form-check-inline mb-2">
                                                        <input class="form-check-input" type="radio" name="sizes" id="32s">
                                                        <label class="form-option-label" for="32s">32</label>
                                                    </div>
                                                    <div class="form-check form-option form-check-inline mb-2">
                                                        <input class="form-check-input" type="radio" name="sizes" id="34s">
                                                        <label class="form-option-label" for="34s">34</label>
                                                    </div>
                                                    <div class="form-check form-option form-check-inline mb-2">
                                                        <input class="form-check-input" type="radio" name="sizes" id="36s">
                                                        <label class="form-option-label" for="36s">36</label>
                                                    </div>
                                                    <div class="form-check form-option form-check-inline mb-2">
                                                        <input class="form-check-input" type="radio" name="sizes" id="38s">
                                                        <label class="form-option-label" for="38s">38</label>
                                                    </div>
                                                    <div class="form-check form-option form-check-inline mb-2">
                                                        <input class="form-check-input" type="radio" name="sizes" id="40s">
                                                        <label class="form-option-label" for="40s">40</label>
                                                    </div>
                                                    <div class="form-check form-option form-check-inline mb-2">
                                                        <input class="form-check-input" type="radio" name="sizes" id="42s">
                                                        <label class="form-option-label" for="42s">42</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                           
                            <!-- Single Option -->
                            <div class="single_search_boxed">
                                <div class="widget-boxed-header">
                                    <h4><a href="#gender" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Gender</a></h4>
                                </div>
                                <div class="widget-boxed-body collapse" id="gender" data-parent="#gender">
                                    <div class="side-list no-border">
                                        <!-- Single Filter Card -->
                                        <div class="single_filter_card">
                                            <div class="card-body pt-0">
                                                <div class="inner_widget_link">
                                                    <ul class="no-ul-list">
                                                        <li>
                                                            <input id="g1" class="checkbox-custom" name="g1" type="checkbox">
                                                            <label for="g1" class="checkbox-custom-label">All<span>22</span></label>
                                                        </li>
                                                        <li>
                                                            <input id="g2" class="checkbox-custom" name="g2" type="checkbox">
                                                            <label for="g2" class="checkbox-custom-label">Male<span>472</span></label>
                                                        </li>
                                                        <li>
                                                            <input id="g3" class="checkbox-custom" name="g3" type="checkbox">
                                                            <label for="g3" class="checkbox-custom-label">Female<span>170</span></label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Single Option -->
                            <div class="single_search_boxed">
                                <div class="widget-boxed-header">
                                    <h4><a href="#discount" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Discount</a></h4>
                                </div>
                                <div class="widget-boxed-body collapse" id="discount" data-parent="#discount">
                                    <div class="side-list no-border">
                                        <!-- Single Filter Card -->
                                        <div class="single_filter_card">
                                            <div class="card-body pt-0">
                                                <div class="inner_widget_link">
                                                    <ul class="no-ul-list">
                                                        <li>
                                                            <input id="d1" class="checkbox-custom" name="d1" type="checkbox">
                                                            <label for="d1" class="checkbox-custom-label">80% Discount<span>22</span></label>
                                                        </li>
                                                        <li>
                                                            <input id="d2" class="checkbox-custom" name="d2" type="checkbox">
                                                            <label for="d2" class="checkbox-custom-label">60% Discount<span>472</span></label>
                                                        </li>
                                                        <li>
                                                            <input id="d3" class="checkbox-custom" name="d3" type="checkbox">
                                                            <label for="d3" class="checkbox-custom-label">50% Discount<span>170</span></label>
                                                        </li>
                                                        <li>
                                                            <input id="d4" class="checkbox-custom" name="d4" type="checkbox">
                                                            <label for="d4" class="checkbox-custom-label">40% Discount<span>170</span></label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Single Option -->
                            <div class="single_search_boxed">
                                <div class="widget-boxed-header">
                                    <h4><a href="#types" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Type</a></h4>
                                </div>
                                <div class="widget-boxed-body collapse" id="types" data-parent="#types">
                                    <div class="side-list no-border">
                                        <!-- Single Filter Card -->
                                        <div class="single_filter_card">
                                            <div class="card-body pt-0">
                                                <div class="inner_widget_link">
                                                    <ul class="no-ul-list">
                                                        <li>
                                                            <input id="t1" class="checkbox-custom" name="t1" type="checkbox">
                                                            <label for="t1" class="checkbox-custom-label">All Type<span>422</span></label>
                                                        </li>
                                                        <li>
                                                            <input id="t2" class="checkbox-custom" name="t2" type="checkbox">
                                                            <label for="t2" class="checkbox-custom-label">Normal Type<span>472</span></label>
                                                        </li>
                                                        <li>
                                                            <input id="t3" class="checkbox-custom" name="t3" type="checkbox">
                                                            <label for="t3" class="checkbox-custom-label">Simple Type<span>170</span></label>
                                                        </li>
                                                        <li>
                                                            <input id="t4" class="checkbox-custom" name="t4" type="checkbox">
                                                            <label for="t4" class="checkbox-custom-label">Modern type<span>140</span></label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Single Option -->
                            <div class="single_search_boxed">
                                <div class="widget-boxed-header">
                                    <h4><a href="#occation" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Occation</a></h4>
                                </div>
                                <div class="widget-boxed-body collapse" id="occation" data-parent="#occation">
                                    <div class="side-list no-border">
                                        <!-- Single Filter Card -->
                                        <div class="single_filter_card">
                                            <div class="card-body pt-0">
                                                <div class="inner_widget_link">
                                                    <ul class="no-ul-list">
                                                        <li>
                                                            <input id="o1" class="checkbox-custom" name="o1" type="checkbox">
                                                            <label for="o1" class="checkbox-custom-label">All Occation<span>422</span></label>
                                                        </li>
                                                        <li>
                                                            <input id="o2" class="checkbox-custom" name="o2" type="checkbox">
                                                            <label for="o2" class="checkbox-custom-label">Normal Occation<span>472</span></label>
                                                        </li>
                                                        <li>
                                                            <input id="t33" class="checkbox-custom" name="o33" type="checkbox">
                                                            <label for="t33" class="checkbox-custom-label">Winter Occation<span>170</span></label>
                                                        </li>
                                                        <li>
                                                            <input id="o4" class="checkbox-custom" name="o4" type="checkbox">
                                                            <label for="o4" class="checkbox-custom-label">Summer Occation<span>140</span></label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Single Option -->
                            <div class="single_search_boxed">
                                <div class="widget-boxed-header">
                                    <h4><a href="#colors" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Colors</a></h4>
                                </div>
                                <div class="widget-boxed-body collapse" id="colors" data-parent="#colors">
                                    <div class="side-list no-border">
                                        <!-- Single Filter Card -->
                                        <div class="single_filter_card">
                                            <div class="card-body pt-0">
                                                <div class="text-left">
                                                    <div class="form-check form-option form-check-inline mb-1">
                                                        <input class="form-check-input" type="radio" name="colora8" id="whitea8">
                                                        <label class="form-option-label rounded-circle" for="whitea8"><span class="form-option-color rounded-circle blc7"></span></label>
                                                    </div>
                                                    <div class="form-check form-option form-check-inline mb-1">
                                                        <input class="form-check-input" type="radio" name="colora8" id="bluea8">
                                                        <label class="form-option-label rounded-circle" for="bluea8"><span class="form-option-color rounded-circle blc2"></span></label>
                                                    </div>
                                                    <div class="form-check form-option form-check-inline mb-1">
                                                        <input class="form-check-input" type="radio" name="colora8" id="yellowa8">
                                                        <label class="form-option-label rounded-circle" for="yellowa8"><span class="form-option-color rounded-circle blc5"></span></label>
                                                    </div>
                                                    <div class="form-check form-option form-check-inline mb-1">
                                                        <input class="form-check-input" type="radio" name="colora8" id="pinka8">
                                                        <label class="form-option-label rounded-circle" for="pinka8"><span class="form-option-color rounded-circle blc3"></span></label>
                                                    </div>
                                                    <div class="form-check form-option form-check-inline mb-1">
                                                        <input class="form-check-input" type="radio" name="colora8" id="reda">
                                                        <label class="form-option-label rounded-circle" for="reda"><span class="form-option-color rounded-circle blc4"></span></label>
                                                    </div>
                                                    <div class="form-check form-option form-check-inline mb-1">
                                                        <input class="form-check-input" type="radio" name="colora8" id="greena">
                                                        <label class="form-option-label rounded-circle" for="greena"><span class="form-option-color rounded-circle blc6"></span></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="border mb-3 mfliud">
                                <div class="row align-items-center py-2 m-0">
                                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
                                        <h6 class="mb-0">{{$products->count()}}</h6>
                                    </div>
                                    
                                    <div class="col-xl-9 col-lg-8 col-md-7 col-sm-12">
                                        <div class="filter_wraps d-flex align-items-center justify-content-end m-start">
                                            <div class="single_fitres mr-2 br-right">
                                                <select class="custom-select simple">
                                                    <option value="1" selected="">Mặc định</option>
                                                    <option value="2">Lọc theo giá: Thấp đến cao</option>
                                                    <option value="3">Lọc theo giá: Cao đến thấp</option>
                                                </select>
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
                            <a href="#" class="btn stretched-link borders m-auto"><i class="lni lni-reload mr-2"></i>Load More</a>
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