@extends('client.layouts.main')

@section('home-slider')
    <div class="home-slider margin-bottom-0">
        <!-- Slide -->
        <div data-background-image="assets/img/banner-3.png" class="item">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="home-slider-container">

                            <!-- Slide Title -->
                            <div class="home-slider-desc">
                                <div class="home-slider-title mb-4">
                                    <h5 class="theme-cl fs-sm ft-ragular mb-0">Winter Collection</h5>
                                    <h1 class="mb-1 ft-bold lg-heading">New Winter<br>Collections 2021</h1>
                                    <span class="trending">There's nothing like trend</span>
                                </div>

                                <a href="#" class="btn stretched-link borders">Shop Now<i class="lni lni-arrow-right ml-2"></i></a>
                            </div>
                            <!-- Slide Title / End -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Slide -->
        <div data-background-image="assets/img/banner-2.png" class="item">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="home-slider-container">

                            <!-- Slide Title -->
                            <div class="home-slider-desc">
                                <div class="home-slider-title mb-4">
                                    <h5 class="theme-cl fs-sm ft-ragular mb-0">Winter Collection</h5>
                                    <h1 class="mb-1 ft-bold lg-heading">New Winter<br>Collections 2021</h1>
                                    <span class="trending">There's nothing like trend</span>
                                </div>

                                <a href="#" class="btn stretched-link borders">Shop Now<i class="lni lni-arrow-right ml-2"></i></a>
                            </div>
                            <!-- Slide Title / End -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide -->
        <div data-background-image="assets/img/banner-7.png" class="item">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="home-slider-container">

                            <!-- Slide Title -->
                            <div class="home-slider-desc">
                                <div class="home-slider-title mb-4">
                                    <h5 class="theme-cl fs-sm ft-ragular mb-0">Winter Collection</h5>
                                    <h1 class="mb-1 ft-bold lg-heading">New Winter<br>Collections 2021</h1>
                                    <span class="trending">There's nothing like trend</span>
                                </div>

                                <a href="#" class="btn stretched-link borders">Shop Now<i class="lni lni-arrow-right ml-2"></i></a>
                            </div>
                            <!-- Slide Title / End -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('content')
<section class="middle">
    <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center">
                    <h2 class="off_title">Trendy Products</h2>
                    <h3 class="ft-bold pt-3">Our Trending Products</h3>
                </div>
            </div>
        </div>
        
        <!-- row -->
        <div class="row align-items-center rows-products">
        
            <!-- Single -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                <div class="product_grid card b-0">
                    <div class="badge bg-success text-white position-absolute ft-regular ab-left text-upper">Sale</div>
                    <div class="card-body p-0">
                        <div class="shop_thumb position-relative">
                            <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="assets/img/product/1.jpg" alt="..."></a>
                            <div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                <div class="edlio"><a href="#" data-toggle="modal" data-target="#quickview" class="text-white fs-sm ft-medium"><i class="fas fa-eye mr-1"></i>Quick View</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer b-0 p-0 pt-2 bg-white">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="text-left">
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color1" id="white" checked="">
                                    <label class="form-option-label small rounded-circle" for="white"><span class="form-option-color rounded-circle blc1"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color1" id="blue">
                                    <label class="form-option-label small rounded-circle" for="blue"><span class="form-option-color rounded-circle blc2"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color1" id="yellow">
                                    <label class="form-option-label small rounded-circle" for="yellow"><span class="form-option-color rounded-circle blc3"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color1" id="pink">
                                    <label class="form-option-label small rounded-circle" for="pink"><span class="form-option-color rounded-circle blc4"></span></label>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn auto btn_love snackbar-wishlist"><i class="far fa-heart"></i></button> 
                            </div>
                        </div>
                        <div class="text-left">
                            <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">Half Running Set</a></h5>
                            <div class="elis_rty"><span class="ft-bold text-dark fs-sm">$99 - $129</span></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Single -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                <div class="product_grid card b-0">
                    <div class="badge bg-info text-white position-absolute ft-regular ab-left text-upper">New</div>
                    <div class="card-body p-0">
                        <div class="shop_thumb position-relative">
                            <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="assets/img/product/2.jpg" alt="..."></a>
                            <div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                <div class="edlio"><a href="#" data-toggle="modal" data-target="#quickview" class="text-white fs-sm ft-medium"><i class="fas fa-eye mr-1"></i>Quick View</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer b-0 p-0 pt-2 bg-white">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="text-left">
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color2" id="white2">
                                    <label class="form-option-label small rounded-circle" for="white2"><span class="form-option-color rounded-circle blc5"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color2" id="blue2">
                                    <label class="form-option-label small rounded-circle" for="blue2"><span class="form-option-color rounded-circle blc2"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color2" id="yellow2">
                                    <label class="form-option-label small rounded-circle" for="yellow2"><span class="form-option-color rounded-circle blc6"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color2" id="pink2">
                                    <label class="form-option-label small rounded-circle" for="pink2"><span class="form-option-color rounded-circle blc4"></span></label>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn auto btn_love snackbar-wishlist"><i class="far fa-heart"></i></button> 
                            </div>
                        </div>
                        <div class="text-left">
                            <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">Formal Men Lowers</a></h5>
                            <div class="elis_rty"><span class="ft-bold text-dark fs-sm">$99 - $129</span></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Single -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                <div class="product_grid card b-0">
                    <div class="card-body p-0">
                        <div class="shop_thumb position-relative">
                            <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="assets/img/product/3.jpg" alt="..."></a>
                            <div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                <div class="edlio"><a href="#" data-toggle="modal" data-target="#quickview" class="text-white fs-sm ft-medium"><i class="fas fa-eye mr-1"></i>Quick View</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer b-0 p-0 pt-2 bg-white">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="text-left">
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color3" id="white3" checked="">
                                    <label class="form-option-label small rounded-circle" for="white3"><span class="form-option-color rounded-circle blc7"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color3" id="blue3">
                                    <label class="form-option-label small rounded-circle" for="blue3"><span class="form-option-color rounded-circle blc2"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color3" id="yellow3">
                                    <label class="form-option-label small rounded-circle" for="yellow3"><span class="form-option-color rounded-circle blc5"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color3" id="pink3">
                                    <label class="form-option-label small rounded-circle" for="pink3"><span class="form-option-color rounded-circle blc3"></span></label>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn auto btn_love snackbar-wishlist"><i class="far fa-heart"></i></button> 
                            </div>
                        </div>
                        <div class="text-left">
                            <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">Half Running Suit</a></h5>
                            <div class="elis_rty"><span class="ft-bold text-dark fs-sm">$99 - $129</span></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Single -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                <div class="product_grid card b-0">
                    <div class="badge bg-warning text-white position-absolute ft-regular ab-left text-upper">Hot</div>
                    <div class="card-body p-0">
                        <div class="shop_thumb position-relative">
                            <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="assets/img/product/4.jpg" alt="..."></a>
                            <div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                <div class="edlio"><a href="#" data-toggle="modal" data-target="#quickview" class="text-white fs-sm ft-medium"><i class="fas fa-eye mr-1"></i>Quick View</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer b-0 p-0 pt-2 bg-white">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="text-left">
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color4" id="white4">
                                    <label class="form-option-label small rounded-circle" for="white4"><span class="form-option-color rounded-circle blc8"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color4" id="blue4">
                                    <label class="form-option-label small rounded-circle" for="blue4"><span class="form-option-color rounded-circle blc2"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color4" id="yellow4">
                                    <label class="form-option-label small rounded-circle" for="yellow4"><span class="form-option-color rounded-circle blc6"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color4" id="pink4">
                                    <label class="form-option-label small rounded-circle" for="pink4"><span class="form-option-color rounded-circle blc5"></span></label>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn auto btn_love snackbar-wishlist"><i class="far fa-heart"></i></button> 
                            </div>
                        </div>
                        <div class="text-left">
                            <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">Half Fancy Lady Dress</a></h5>
                            <div class="elis_rty"><span class="ft-bold text-dark fs-sm">$99 - $129</span></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Single -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                <div class="product_grid card b-0">
                    <div class="card-body p-0">
                        <div class="shop_thumb position-relative">
                            <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="assets/img/product/5.jpg" alt="..."></a>
                            <div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                <div class="edlio"><a href="#" data-toggle="modal" data-target="#quickview" class="text-white fs-sm ft-medium"><i class="fas fa-eye mr-1"></i>Quick View</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer b-0 p-0 pt-2 bg-white">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="text-left">
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color5" id="white5">
                                    <label class="form-option-label small rounded-circle" for="white5"><span class="form-option-color rounded-circle blc8"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color5" id="blue5">
                                    <label class="form-option-label small rounded-circle" for="blue5"><span class="form-option-color rounded-circle blc5"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color5" id="yellow5">
                                    <label class="form-option-label small rounded-circle" for="yellow5"><span class="form-option-color rounded-circle blc3"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color5" id="pink5">
                                    <label class="form-option-label small rounded-circle" for="pink5"><span class="form-option-color rounded-circle blc6"></span></label>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn auto btn_love snackbar-wishlist"><i class="far fa-heart"></i></button> 
                            </div>
                        </div>
                        <div class="text-left">
                            <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">Flix Flox Jeans</a></h5>
                            <div class="elis_rty"><span class="ft-bold text-dark fs-sm">$99 - $129</span></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Single -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                <div class="product_grid card b-0">
                    <div class="badge bg-danger text-white position-absolute ft-regular ab-left text-upper">Hot</div>
                    <div class="card-body p-0">
                        <div class="shop_thumb position-relative">
                            <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="assets/img/product/6.jpg" alt="..."></a>
                            <div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                <div class="edlio"><a href="#" data-toggle="modal" data-target="#quickview" class="text-white fs-sm ft-medium"><i class="fas fa-eye mr-1"></i>Quick View</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer b-0 p-0 pt-2 bg-white">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="text-left">
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color6" id="white6">
                                    <label class="form-option-label small rounded-circle" for="white"><span class="form-option-color rounded-circle blc1"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color6" id="blue6">
                                    <label class="form-option-label small rounded-circle" for="blue6"><span class="form-option-color rounded-circle blc7"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color6" id="yellow6">
                                    <label class="form-option-label small rounded-circle" for="yellow6"><span class="form-option-color rounded-circle blc3"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color6" id="pink6">
                                    <label class="form-option-label small rounded-circle" for="pink6"><span class="form-option-color rounded-circle blc6"></span></label>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn auto btn_love snackbar-wishlist"><i class="far fa-heart"></i></button> 
                            </div>
                        </div>
                        <div class="text-left">
                            <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">Fancy Salwar Suits</a></h5>
                            <div class="elis_rty"><span class="ft-bold text-dark fs-sm">$99 - $129</span></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Single -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                <div class="product_grid card b-0">
                    <div class="badge bg-success text-white position-absolute ft-regular ab-left text-upper">Sale</div>
                    <div class="card-body p-0">
                        <div class="shop_thumb position-relative">
                            <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="assets/img/product/7.jpg" alt="..."></a>
                            <div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                <div class="edlio"><a href="#" data-toggle="modal" data-target="#quickview" class="text-white fs-sm ft-medium"><i class="fas fa-eye mr-1"></i>Quick View</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer b-0 p-0 pt-2 bg-white">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="text-left">
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color7" id="white7">
                                    <label class="form-option-label small rounded-circle" for="white7"><span class="form-option-color rounded-circle blc2"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color7" id="blue7">
                                    <label class="form-option-label small rounded-circle" for="blue7"><span class="form-option-color rounded-circle blc8"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color7" id="yellow7">
                                    <label class="form-option-label small rounded-circle" for="yellow7"><span class="form-option-color rounded-circle blc3"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color7" id="pink7">
                                    <label class="form-option-label small rounded-circle" for="pink7"><span class="form-option-color rounded-circle blc6"></span></label>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn auto btn_love snackbar-wishlist"><i class="far fa-heart"></i></button> 
                            </div>
                        </div>
                        <div class="text-left">
                            <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">Printed Straight Kurta</a></h5>
                            <div class="elis_rty"><span class="ft-bold text-dark fs-sm">$99 - $129</span></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Single -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                <div class="product_grid card b-0">
                    <div class="badge bg-success text-white position-absolute ft-regular ab-left text-upper">Sale</div>
                    <div class="card-body p-0">
                        <div class="shop_thumb position-relative">
                            <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="assets/img/product/1.jpg" alt="..."></a>
                            <div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                <div class="edlio"><a href="#" data-toggle="modal" data-target="#quickview" class="text-white fs-sm ft-medium"><i class="fas fa-eye mr-1"></i>Quick View</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer b-0 p-0 pt-2 bg-white">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="text-left">
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color88" id="white88">
                                    <label class="form-option-label small rounded-circle" for="white88"><span class="form-option-color rounded-circle blc7"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color88" id="blue88">
                                    <label class="form-option-label small rounded-circle" for="blue88"><span class="form-option-color rounded-circle blc2"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color88" id="yellow88">
                                    <label class="form-option-label small rounded-circle" for="yellow88"><span class="form-option-color rounded-circle blc5"></span></label>
                                </div>
                                <div class="form-check form-option form-check-inline mb-1">
                                    <input class="form-check-input" type="radio" name="color88" id="pink88">
                                    <label class="form-option-label small rounded-circle" for="pink88"><span class="form-option-color rounded-circle blc3"></span></label>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn auto btn_love snackbar-wishlist"><i class="far fa-heart"></i></button> 
                            </div>
                        </div>
                        <div class="text-left">
                            <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">Collot Full Dress</a></h5>
                            <div class="elis_rty"><span class="ft-bold text-dark fs-sm">$99 - $129</span></div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- row -->
        
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="position-relative text-center">
                    <a href="shop-style-1.html" class="btn stretched-link borders">Explore More<i class="lni lni-arrow-right ml-2"></i></a>
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
                        <div class="sng_rev_thumb"><figure><img src="assets/img/team-1.jpg" class="img-fluid circle" alt="" /></figure></div>
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
                        <div class="sng_rev_thumb"><figure><img src="assets/img/team-2.jpg" class="img-fluid circle" alt="" /></figure></div>
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
                        <div class="sng_rev_thumb"><figure><img src="assets/img/team-3.jpg" class="img-fluid circle" alt="" /></figure></div>
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
                        <div class="sng_rev_thumb"><figure><img src="assets/img/team-4.jpg" class="img-fluid circle" alt="" /></figure></div>
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

<section class="space min">
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="sec_title position-relative text-center">
                    <h2 class="off_title">Latest News</h2>
                    <h3 class="ft-bold pt-3">New Updates</h3>
                </div>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="_blog_wrap">
                    <div class="_blog_thumb mb-2">
                        <a href="blog-detail.html" class="d-block"><img src="assets/img/bl-1.png" class="img-fluid rounded" alt="" /></a>
                    </div>
                    <div class="_blog_caption">
                        <span class="text-muted">26 Jan 2021</span>
                        <h5 class="bl_title lh-1"><a href="blog-detail.html">Let's start bring sale on this saummer vacation.</a></h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</p>
                        <a href="blog-detail.html" class="text-dark fs-sm">Continue Reading..</a>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="_blog_wrap">
                    <div class="_blog_thumb mb-2">
                        <a href="blog-detail.html" class="d-block"><img src="assets/img/bl-2.png" class="img-fluid rounded" alt="" /></a>
                    </div>
                    <div class="_blog_caption">
                        <span class="text-muted">17 July 2021</span>
                        <h5 class="bl_title lh-1"><a href="blog-detail.html">Let's start bring sale on this saummer vacation.</a></h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</p>
                        <a href="blog-detail.html" class="text-dark fs-sm">Continue Reading..</a>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="_blog_wrap">
                    <div class="_blog_thumb mb-2">
                        <a href="blog-detail.html" class="d-block"><img src="assets/img/bl-3.png" class="img-fluid rounded" alt="" /></a>
                    </div>
                    <div class="_blog_caption">
                        <span class="text-muted">10 Aug 2021</span>
                        <h5 class="bl_title lh-1"><a href="blog-detail.html">Let's start bring sale on this saummer vacation.</a></h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</p>
                        <a href="blog-detail.html" class="text-dark fs-sm">Continue Reading..</a>
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
                        <a href="javascript:void(0);" class="d-block"><img src="assets/img/i-1.png" class="img-fluid" alt="" /></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="_insta_wrap">
                    <div class="_insta_thumb">
                        <a href="javascript:void(0);" class="d-block"><img src="assets/img/i-2.png" class="img-fluid" alt="" /></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="_insta_wrap">
                    <div class="_insta_thumb">
                        <a href="javascript:void(0);" class="d-block"><img src="assets/img/i-3.png" class="img-fluid" alt="" /></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="_insta_wrap">
                    <div class="_insta_thumb">
                        <a href="javascript:void(0);" class="d-block"><img src="assets/img/i-7.png" class="img-fluid" alt="" /></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="_insta_wrap">
                    <div class="_insta_thumb">
                        <a href="javascript:void(0);" class="d-block"><img src="assets/img/i-8.png" class="img-fluid" alt="" /></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="_insta_wrap">
                    <div class="_insta_thumb">
                        <a href="javascript:void(0);" class="d-block"><img src="assets/img/i-4.png" class="img-fluid" alt="" /></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="_insta_wrap">
                    <div class="_insta_thumb">
                        <a href="javascript:void(0);" class="d-block"><img src="assets/img/i-5.png" class="img-fluid" alt="" /></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="_insta_wrap">
                    <div class="_insta_thumb">
                        <a href="javascript:void(0);" class="d-block"><img src="assets/img/i-6.png" class="img-fluid" alt="" /></a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
</section>
@endsection

@section('scripts')
        
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->	

		<script>
			function openWishlist() {
				document.getElementById("Wishlist").style.display = "block";
			}
			function closeWishlist() {
				document.getElementById("Wishlist").style.display = "none";
			}
		</script>
		
		<script>
			function openCart() {
				document.getElementById("Cart").style.display = "block";
			}
			function closeCart() {
				document.getElementById("Cart").style.display = "none";
			}
		</script>

		<script>
			function openSearch() {
				document.getElementById("Search").style.display = "block";
			}
			function closeSearch() {
				document.getElementById("Search").style.display = "none";
			}
		</script>	
@endsection