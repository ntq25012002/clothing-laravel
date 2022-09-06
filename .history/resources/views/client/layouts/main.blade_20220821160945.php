<!DOCTYPE html>
<html lang="zxx">
	
<!-- Mirrored from themezhub.net/kumo-demo-2/kumo/home-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Aug 2022 02:01:12 GMT -->
<head>
		<meta charset="utf-8" />
		<meta name="author" content="Themezhub" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="_token" content="{{csrf_token()}}" />
		
        <title>Kumo - Cửa hàng thời trang</title>
		 
        <!-- Custom CSS -->
        @include('client.layouts._style')
		@yield('css')
    </head>
	
    <body>
	
		 <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
       <div class="preloader"></div>
		
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <!-- Start Navigation -->
			@include('client.layouts._header')
			
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			<!-- ============================ Hero Banner  Start================================== -->
			@yield('home-slider')
			<!-- ============================ Hero Banner End ================================== -->
			
			<!-- ======================= Product List ======================== -->
			@yield('content')
			<!-- ======================= Product List ======================== -->
			
			<!-- ======================= Customer Review ======================== -->
			
			<!-- ======================= Customer Review ======================== -->
			
			<!-- ======================= Blog Start ============================ -->
			
			<!-- ======================= Blog Start ============================ -->
			
			<!-- ======================= Instagram Start ============================ -->
			
			<!-- ======================= Instagram Start ============================ -->
			
			<!-- ============================ Footer Start ================================== -->
			@include('client.layouts._footer')
			<!-- ============================ Footer End ================================== -->
			

			<!-- Product View Modal -->
			<div class="modal fade lg-modal" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickviewmodal" aria-hidden="true">
				<div class="modal-dialog modal-xl login-pop-form" role="document">
					<div class="modal-content" id="quickviewmodal">
						<div class="modal-headers">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span class="ti-close"></span>
							</button>
						</div>
					
						<div class="modal-body">
							<div class="quick_view_wrap">
					
								<div class="quick_view_thmb">
									<div class="quick_view_slide">
										<div class="single_view_slide"><img src="{{asset('client/assets/img/product/1.jpg')}}" class="img-fluid" alt="" /></div>
										<div class="single_view_slide"><img src="{{asset('client/assets/img/product/2.jpg')}}" class="img-fluid" alt="" /></div>
										<div class="single_view_slide"><img src="{{asset('client/assets/img/product/3.jpg')}}" class="img-fluid" alt="" /></div>
										<div class="single_view_slide"><img src="{{asset('client/assets/img/product/4.jpg')}}" class="img-fluid" alt="" /></div>
									</div>
								</div>
								
								<div class="quick_view_capt">
									<div class="prd_details">
										
										<div class="prt_01 mb-1"><span class="text-light bg-info rounded px-2 py-1">Dresses</span></div>
										<div class="prt_02 mb-2">
											<h2 class="ft-bold mb-1">Women Striped Shirt Dress</h2>
											<div class="text-left">
												<div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star"></i>
													<span class="small">(412 Reviews)</span>
												</div>
												<div class="elis_rty"><span class="ft-medium text-muted line-through fs-md mr-2">$199</span><span class="ft-bold theme-cl fs-lg mr-2">$110</span><span class="ft-regular text-danger bg-light-danger py-1 px-2 fs-sm">Out of Stock</span></div>
											</div>
										</div>
										
										<div class="prt_03 mb-3">
											<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.</p>
										</div>
										
										<div class="prt_04 mb-2">
											<p class="d-flex align-items-center mb-0 text-dark ft-medium">Color:</p>
											<div class="text-left">
												<div class="form-check form-option form-check-inline mb-1">
													<input class="form-check-input" type="radio" name="color8" id="white8">
													<label class="form-option-label rounded-circle" for="white8"><span class="form-option-color rounded-circle blc7"></span></label>
												</div>
												<div class="form-check form-option form-check-inline mb-1">
													<input class="form-check-input" type="radio" name="color8" id="blue8">
													<label class="form-option-label rounded-circle" for="blue8"><span class="form-option-color rounded-circle blc2"></span></label>
												</div>
												<div class="form-check form-option form-check-inline mb-1">
													<input class="form-check-input" type="radio" name="color8" id="yellow8">
													<label class="form-option-label rounded-circle" for="yellow8"><span class="form-option-color rounded-circle blc5"></span></label>
												</div>
												<div class="form-check form-option form-check-inline mb-1">
													<input class="form-check-input" type="radio" name="color8" id="pink8">
													<label class="form-option-label rounded-circle" for="pink8"><span class="form-option-color rounded-circle blc3"></span></label>
												</div>
												<div class="form-check form-option form-check-inline mb-1">
													<input class="form-check-input" type="radio" name="color8" id="red">
													<label class="form-option-label rounded-circle" for="red"><span class="form-option-color rounded-circle blc4"></span></label>
												</div>
												<div class="form-check form-option form-check-inline mb-1">
													<input class="form-check-input" type="radio" name="color8" id="green">
													<label class="form-option-label rounded-circle" for="green"><span class="form-option-color rounded-circle blc6"></span></label>
												</div>
											</div>
										</div>
										
										<div class="prt_04 mb-4">
											<p class="d-flex align-items-center mb-0 text-dark ft-medium">Size:</p>
											<div class="text-left pb-0 pt-2">
												<div class="form-check size-option form-option form-check-inline mb-2">
													<input class="form-check-input" type="radio" name="size2" id="28" checked="">
													<label class="form-option-label" for="28">28</label>
												</div>
												<div class="form-check form-option size-option  form-check-inline mb-2">
													<input class="form-check-input" type="radio" name="size2" id="30">
													<label class="form-option-label" for="30">30</label>
												</div>
												<div class="form-check form-option size-option  form-check-inline mb-2">
													<input class="form-check-input" type="radio" name="size2" id="32">
													<label class="form-option-label" for="32">32</label>
												</div>
												<div class="form-check form-option size-option  form-check-inline mb-2">
													<input class="form-check-input" type="radio" name="size2" id="34">
													<label class="form-option-label" for="34">34</label>
												</div>
												<div class="form-check form-option size-option  form-check-inline mb-2">
													<input class="form-check-input" type="radio" name="size2" id="36">
													<label class="form-option-label" for="36">36</label>
												</div>
												<div class="form-check form-option size-option  form-check-inline mb-2">
													<input class="form-check-input" type="radio" name="size2" id="38">
													<label class="form-option-label" for="38">38</label>
												</div>
												<div class="form-check form-option size-option  form-check-inline mb-2">
													<input class="form-check-input" type="radio" name="size2" id="40">
													<label class="form-option-label" for="40">40</label>
												</div>
											</div>
										</div>
										
										<div class="prt_05 mb-4">
											<div class="form-row mb-7">
												<div class="col-12 col-lg-auto">
													<!-- Quantity -->
													<select class="mb-2 custom-select">
													  <option value="1" selected="">1</option>
													  <option value="2">2</option>
													  <option value="3">3</option>
													  <option value="4">4</option>
													  <option value="5">5</option>
													</select>
												</div>
												<div class="col-12 col-lg">
													<!-- Submit -->
													<button type="submit" class="btn btn-block custom-height bg-dark mb-2">
														<i class="lni lni-shopping-basket mr-2"></i>Add to Cart 
													</button>
												</div>
												<div class="col-12 col-lg-auto">
													<!-- Wishlist -->
													<button class="btn custom-height btn-default btn-block mb-2 text-dark" data-toggle="button">
														<i class="lni lni-heart mr-2"></i>Wishlist
													</button>
												</div>
										  </div>
										</div>
										
										<div class="prt_06">
											<p class="mb-0 d-flex align-items-center">
											  <span class="mr-4">Share:</span>
											  <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted mr-2" href="#!">
												<i class="fab fa-twitter position-absolute"></i>
											  </a>
											  <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted mr-2" href="#!">
												<i class="fab fa-facebook-f position-absolute"></i>
											  </a>
											  <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted" href="#!">
												<i class="fab fa-pinterest-p position-absolute"></i>
											  </a>
											</p>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->
			
			{{-- Toast --}}
			<div>
				<div id="toast">
					
				</div>
			</div>
			{{-- end toast --}}

			<!-- Log In Modal -->
			<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
				<div class="modal-dialog modal-xl login-pop-form" role="document">
					<div class="modal-content" id="loginmodal">
						<div class="modal-headers">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span class="ti-close"></span>
							</button>
						  </div>
					
						<div class="modal-body p-5">
							<div class="text-center mb-4">
								<h2 class="m-0 ft-regular">Đăng nhập</h2>
							</div>
							<form action="" method="post">				
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" placeholder="Email*">
								</div>
								<div class="form-group">
									<label>Mật khẩu</label>
									<input type="password" name="password" class="form-control" placeholder="Mật khẩu*">
								</div>
								{{-- <div class="form-group">
									<div class="d-flex align-items-center justify-content-between">
										<div class="flex-1">
											<input id="dd" class="checkbox-custom" name="dd" type="checkbox">
											<label for="dd" class="checkbox-custom-label">Remember Me</label>
										</div>	
										<div class="eltio_k2">
											<a href="#">Lost Your Password?</a>
										</div>	
									</div>
								</div> --}}
								<div class="form-group">
									<button type="submit" class="btn btn-md full-width bg-dark text-light fs-md ft-medium">Đăng nhập</button>
								</div>
								
								<div class="form-group text-center mb-0">
									<p class="extra">Chưa có tài khoản?<a href="#et-register-wrap" class="text-dark"> Đăng ký</a></p>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->
			
			<!-- Search -->
			<div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="Search">
				<div class="rightMenu-scroll">
					<div class="d-flex align-items-center justify-content-between slide-head py-3 px-3">
						<h4 class="cart_heading fs-md ft-medium mb-0">Search Products</h4>
						<button onclick="closeSearch()" class="close_slide"><i class="ti-close"></i></button>
					</div>
						
					<div class="cart_action px-3 py-4">
						<form class="form m-0 p-0">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Product Keyword.." />
							</div>
							
							<div class="form-group">
								<select class="custom-select">
								  <option value="1" selected="">Choose Category</option>
								  <option value="2">Men's Store</option>
								  <option value="3">Women's Store</option>
								  <option value="4">Kid's Fashion</option>
								  <option value="5">Inner Wear</option>
								</select>
							</div>
							
							<div class="form-group mb-0">
								<button type="button" class="btn d-block full-width btn-dark">Search Product</button>
							</div>
						</form>
					</div>
					
					<div class="d-flex align-items-center justify-content-center br-top br-bottom py-2 px-3">
						<h4 class="cart_heading fs-md mb-0">Hot Categories</h4>
					</div>
						
					<div class="cart_action px-3 py-3">
						<div class="row">
							<div class="col-xl-4 col-lg-4 col-md-4 col-4 mb-3">
								<div class="cats_side_wrap text-center">
									<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-3 circle mb-2 gray"><a href="javascript:void(0);" class="d-block"><img src="{{asset('client/assets/img/tshirt.png')}}" class="img-fluid" width="40" alt="" /></a></div></div>
									<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">T-Shirts</a></h6></div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-4 mb-3">
								<div class="cats_side_wrap text-center">
									<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-3 circle mb-2 gray"><a href="javascript:void(0);" class="d-block"><img src="{{asset('client/assets/img/pant.png')}}" class="img-fluid" width="40" alt="" /></a></div></div>
									<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Pants</a></h6></div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-4 mb-3">
								<div class="cats_side_wrap text-center">
									<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-3 circle mb-2 gray"><a href="javascript:void(0);" class="d-block"><img src="{{asset('client/assets/img/fashion.png')}}" class="img-fluid" width="40" alt="" /></a></div></div>
									<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Women's</a></h6></div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-4 mb-3">
								<div class="cats_side_wrap text-center">
									<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-3 circle mb-2 gray"><a href="javascript:void(0);" class="d-block"><img src="{{asset('client/assets/img/sneakers.png')}}" class="img-fluid" width="40" alt="" /></a></div></div>
									<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Shoes</a></h6></div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-4 mb-3">
								<div class="cats_side_wrap text-center">
									<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-3 circle mb-2 gray"><a href="javascript:void(0);" class="d-block"><img src="{{asset('client/assets/img/television.png')}}" class="img-fluid" width="40" alt="" /></a></div></div>
									<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Television</a></h6></div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-4 mb-3">
								<div class="cats_side_wrap text-center">
									<div class="sl_cat_01"><div class="d-inline-flex align-items-center justify-content-center p-3 circle mb-2 gray"><a href="javascript:void(0);" class="d-block"><img src="{{asset('client/assets/img/accessories.png')}}" class="img-fluid" width="40" alt="" /></a></div></div>
									<div class="sl_cat_02"><h6 class="m-0 ft-medium fs-sm"><a href="javascript:void(0);">Accessories</a></h6></div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			
			<!-- Wishlist -->
			<div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="Wishlist">
				<div class="rightMenu-scroll">
					<div class="d-flex align-items-center justify-content-between slide-head py-3 px-3">
						<h4 class="cart_heading fs-md ft-medium mb-0">Saved Products</h4>
						<button onclick="closeWishlist()" class="close_slide"><i class="ti-close"></i></button>
					</div>
					<div class="right-ch-sideBar">

						<div class="cart_select_items py-2">
							<!-- Single Item -->
							<div class="d-flex align-items-center justify-content-between br-bottom px-3 py-3">
								<div class="cart_single d-flex align-items-center">
									<div class="cart_selected_single_thumb">
										<a href="#"><img src="{{asset('client/assets/img/product/4.jpg')}}" width="60" class="img-fluid" alt="" /></a>
									</div>
									<div class="cart_single_caption pl-2">
										<h4 class="product_title fs-sm ft-medium mb-0 lh-1">Women Striped Shirt Dress</h4>
										<p class="mb-2"><span class="text-dark ft-medium small">36</span>, <span class="text-dark small">Red</span></p>
										<h4 class="fs-md ft-medium mb-0 lh-1">$129</h4>
									</div>
								</div>
								<div class="fls_last"><button class="close_slide gray"><i class="ti-close"></i></button></div>
							</div>
							
						</div>
						
						<div class="d-flex align-items-center justify-content-between br-top br-bottom px-3 py-3">
							<h6 class="mb-0">Tổng tiền</h6>
							<h3 class="mb-0 ft-medium">$417</h3>
						</div>
						
						<div class="cart_action px-3 py-3">
							<div class="form-group">
								<button type="button" class="btn d-block full-width btn-dark">Move To Cart</button>
							</div>
							<div class="form-group">
								<button type="button" class="btn d-block full-width btn-dark-light">Edit or View</button>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			
			<!-- Cart -->
			<div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="Cart">
				<div class="rightMenu-scroll">
					<div class="d-flex align-items-center justify-content-between slide-head py-3 px-3">
						<h4 class="cart_heading fs-md ft-medium mb-0">Giỏ hàng</h4>
						<button onclick="closeCart()" class="close_slide"><i class="ti-close"></i></button>
					</div>
					<div class="right-ch-sideBar">
						
						<div class="cart_select_item py-2" id="cart_item">
							<!-- Single Item -->
							@if (!empty(session()->get('myCart')) && count(session()->get('myCart')) > 0)
									{{-- @php
										$total = 0;
									@endphp --}}
								@foreach (session()->get('myCart') as $key => $item)
									{{-- @php
										$total += $item['quantity'] * $item['price'];
									@endphp --}}
									<div class="d-flex align-items-center justify-content-between br-bottom px-3 py-3">
										<div class="cart_single d-flex align-items-center">
											<div class="cart_selected_single_thumb">
												<a href="#"><img src="{{asset($item['image'])}}" width="60" class="img-fluid" alt="" /></a>
											</div>
											<div class="cart_single_caption pl-2">
												<h4 class="product_title fs-sm ft-medium mb-0 lh-1">{{$item['name']}}</h4>
												<p class="mb-2"><span class="text-dark ft-medium small">{{$item['size']}}</span>, <span class="text-dark small" style="display:inline-block; margin-bottom: -3px; background-color: {{$item['color']}};width:12px;height:12px"></span></p>
												<h4 class="fs-md ft-medium mb-0 lh-1" id="prd_quantity{{$key}}"  data-prd_quantity{{$key}}='{{$item['quantity']}}'>{{number_format($item['price'],'0',',','.')}}đ x {{$item['quantity']}}</h4>
											</div>
										</div>
										<div class="fls_last"><button class="close_slide gray btn_remove" data-urlDelete="{{route('remove-cart-item',['id' => $key ])}}"><i class="ti-close"></i></button></div>
									</div>
								@endforeach
								<div class="d-flex align-items-center justify-content-between br-top br-bottom px-3 py-3">
									<h6 class="mb-0">Tổng tiền:</h6>
									<h3 class="mb-0 ft-medium">{{number_format(session()->get('total'),'0',',','.')}} đ</h3>
								</div>
								
								<div class="cart_action px-3 py-3">
									<div class="form-group">
										<a href="{{route('checkout')}}" class="btn d-block full-width btn-dark">Thanh toán</a>
									</div>
									<div class="form-group">
										<a href="{{route('shopping-cart')}}" class="btn d-block full-width btn-dark-light">Chi tiết giỏ hàng</a>
									</div>
								</div>
							@else
								<h3 class="text-center mt-2">Giỏ hàng trống</h3>
							@endif
						</div>
						
					</div>
				</div>
			</div>
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
			
		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
        @include('client.layouts._script')
		@yield('scripts')

	</body>

<!-- Mirrored from themezhub.net/kumo-demo-2/kumo/home-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Aug 2022 02:02:12 GMT -->
</html>