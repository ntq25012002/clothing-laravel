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
        .form-option-label.small {
            width: 32px;
            height: 32px;
        }
        .form-option-color {
            border-radius: 50%; 
        }
        
        .form-option-size {
            display: block;
            position: absolute;
            top: 43%;
            left: 50%;
            width: 0.8rem;
            height: 0.8rem;
            margin-top: -0.4rem;
            margin-left: -0.4rem;
            background-position: top left;
            background-size: 1rem 1rem;
            background-repeat: no-repeat;
        }
        .rounded-circle-size {
            border-radius:0
        }
    </style>
@endsection
@section('content')
    
			<!-- ======================= Top Breadcrubms ======================== -->
			<div class="gray py-3">
				<div class="container">
					<div class="row">
						<div class="colxl-12 col-lg-12 col-md-12">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item"><a href="#">Library</a></li>
									<li class="breadcrumb-item active" aria-current="page">Data</li>
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
					<form action="{{route('add-to-cart',['slug' => $product->slug])}}" method="post" class="row">
						@csrf
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
							<div class="sp-loading"><img src="{{asset('client/assets/img/product/15.png')}}" alt=""><br>LOADING IMAGES</div>
							<div class="sp-wrap">
								<a href="{{asset($product->feature_image)}}"><img src="{{asset($product->feature_image)}}" alt=""></a>
								@foreach ($product->images as $item)
                                    <a href="{{asset('storage/product/'.$item->image)}}"><img src="{{asset('storage/product/'.$item->image)}}" alt=""></a>
                                @endforeach
                                
							</div>
						</div>
						
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
							<div class="prd_details">
								
								<div class="prt_01 mb-2"><span class="text-success bg-light-success rounded px-2 py-1">Women's Suit</span></div>
								<div class="prt_02 mb-3">
									<h2 class="ft-bold mb-1">{{$product->name}}</h2>
									<div class="text-left">
										{{-- <div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="small">(412 Reviews)</span>
										</div> --}}
										<div class="elis_rty">
                                            @if ($product->promotional_price > 0)
                                                <span class="ft-medium text-muted line-through fs-md mr-2">{{number_format($product->price,'0',',','.')}}đ</span>
                                                <span class="ft-bold theme-cl fs-lg">{{number_format($product->promotional_price,'0',',','.')}}đ</span>
                                            @else
                                                <span class="ft-bold theme-cl fs-lg">{{number_format($product->price,'0',',','.')}}đ</span>
                                            @endif
                                        </div>
									</div>
								</div>
								
								<div class="prt_03 mb-4">
									@foreach ($product->attributes as $itemAttr)
                                        @if ($itemAttr->name == 'color')
                                            <div class="form-check form-option form-check-inline mb-1">
                                                <input class="form-check-input" type="radio" value="{{$itemAttr->id}}" name="color" id="color{{$itemAttr->id}}">
                                                <label class="form-option-label small rounded-circle" for="color{{$itemAttr->id}}"><span class="form-option-color" style="background-color:{{$itemAttr->value}}"></span></label>
                                            </div>
                                        @endif
                                    @endforeach
								</div>
								<div class="prt_03 mb-4">
                                    @foreach ($product->attributes as $itemAttr)
                                        @if ($itemAttr->name == 'size')
                                            <div class="form-check form-option form-check-inline mb-1">
                                                <input class="form-check-input" type="radio" value="{{$itemAttr->id}}" name="size" id="size{{$itemAttr->id}}">
                                                <label class="form-option-label small rounded-circle-size" for="size{{$itemAttr->id}}"><span class="form-option-size">{{$itemAttr->value}}</span></label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <input type="text" name="id" id="" value="{{$product->id}}" hidden>
								<div class="prt_04 mb-4">
                                    <p class="d-flex align-items-center mb-1">Còn lại:<strong class="fs-sm text-dark ft-medium ml-1">{{$product->quantity}}</strong></p>
									<p class="d-flex align-items-center mb-1">Loại:<strong class="fs-sm text-dark ft-medium ml-1">{{$product->category->name}}</strong></p>
									<p class="d-flex align-items-center mb-0">
                                        Tags:
                                        @foreach ($product->tags as $tag)
                                            <strong class="fs-sm text-dark ft-medium ml-1">{{$tag->name}},</strong>
                                        @endforeach
                                    </p>
								</div>
								
								<div class="prt_05 mb-4">
									<div class="form-row mb-7">
										<div class="col-12 col-lg-auto">
											<!-- Quantity -->
                                            <input type="number" name="quantity" class="mb-2 custom-input" value="1" min="0" max="{{$product->quantity}}">
										</div>
										<div class="col-12 col-lg">
											<!-- Submit -->
											<button type="submit" data-url="{{route('add-to-cart',['slug' => $item->slug])}}" data-prd_id="{{$product->id}}" class="btn btn-block custom-height bg-dark mb-2 add-to-cart" >
												<i class="lni lni-shopping-basket mr-2"></i>Thêm vào giỏ hàng
											</button>
										</div>
										<div class="col-12 col-lg-auto">
											<!-- Wishlist -->
											<button class="btn custom-height btn-default btn-block mb-2 text-dark" data-toggle="button">
												<i class="lni lni-heart mr-2"></i>Yêu thích
											</button>
										</div>
								  </div>
								</div>
								
								<div class="prt_06">
									<p class="mb-0 d-flex align-items-center">
									  <span class="mr-4">Chia sẻ:</span>
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
					</form>
				</div>
			</section>
			<!-- ======================= Product Detail End ======================== -->
			
			<!-- ======================= Product Description ======================= -->
			<section class="middle">
				<div class="container">
					<div class="row align-items-center justify-content-center">
						<div class="col-xl-11 col-lg-12 col-md-12 col-sm-12">
							<ul class="nav nav-tabs b-0 d-flex align-items-center justify-content-center simple_tab_links mb-4" id="myTab" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" id="description-tab" href="#description" data-toggle="tab" role="tab" aria-controls="description" aria-selected="true">Mô tả sản phẩm</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" href="#information" id="information-tab" data-toggle="tab" role="tab" aria-controls="information" aria-selected="false">Thông tin thêm</a>
								</li>
								{{-- <li class="nav-item" role="presentation">
									<a class="nav-link" href="#reviews" id="reviews-tab" data-toggle="tab" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
								</li> --}}
							</ul>
							
							<div class="tab-content" id="myTabContent">
								
								<!-- Description Content -->
								<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
									<div class="description_info">
										{!! $product->description !!}
									</div>
								</div>
								
								<!-- Additional Content -->
								<div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="information-tab">
									<div class="additionals">
										<table class="table">
											<tbody>
												{{-- <tr>
												  <th class="ft-medium text-dark">ID</th>
												  <td>#1253458</td>
												</tr> --}}
												{{-- <tr>
												  <th class="ft-medium text-dark">SKU</th>
												  <td>KUM125896</td>
												</tr> --}}
												<tr>
												  <th class="ft-medium text-dark">Màu sắc</th>
												  <td>
                                                    @foreach ($product->attributes as $itemAttr)
                                                        @if ($itemAttr->name == 'color')
                                                            <div class="form-check form-option form-check-inline mb-1" style="margin-right: 1.9rem;">
                                                                <span class="form-option-color " style="background-color:{{$itemAttr->value}}"></span>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                  </td>
												</tr>
												<tr>
												  <th class="ft-medium text-dark">Size</th>
												  <td>
                                                    @foreach ($product->attributes as $itemAttr)
                                                        @if ($itemAttr->name == 'size')
                                                            <div class="form-check form-option form-check-inline mb-1" style="margin-right: 1.9rem;">
                                                                <span class="form-option-color ">{{$itemAttr->value}}</span>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                  </td>
												</tr>
												
											</tbody>
										</table>
									</div>
								</div>
								
								<!-- Reviews Content -->
								{{-- <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
									<div class="reviews_info">
										<div class="single_rev d-flex align-items-start br-bottom py-3">
											<div class="single_rev_thumb"><img src="assets/img/team-1.jpg" class="img-fluid circle" width="90" alt="" /></div>
											<div class="single_rev_caption d-flex align-items-start pl-3">
												<div class="single_capt_left">
													<h5 class="mb-0 fs-md ft-medium lh-1">Daniel Rajdesh</h5>
													<span class="small">30 jul 2021</span>
													<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum</p>
												</div>
												<div class="single_capt_right">
													<div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
													</div>
												</div>
											</div>
										</div>
										
										<!-- Single Review -->
										<div class="single_rev d-flex align-items-start br-bottom py-3">
											<div class="single_rev_thumb"><img src="assets/img/team-2.jpg" class="img-fluid circle" width="90" alt="" /></div>
											<div class="single_rev_caption d-flex align-items-start pl-3">
												<div class="single_capt_left">
													<h5 class="mb-0 fs-md ft-medium lh-1">Seema Gupta</h5>
													<span class="small">30 Aug 2021</span>
													<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum</p>
												</div>
												<div class="single_capt_right">
													<div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
													</div>
												</div>
											</div>
										</div>
										
										<!-- Single Review -->
										<div class="single_rev d-flex align-items-start br-bottom py-3">
											<div class="single_rev_thumb"><img src="assets/img/team-3.jpg" class="img-fluid circle" width="90" alt="" /></div>
											<div class="single_rev_caption d-flex align-items-start pl-3">
												<div class="single_capt_left">
													<h5 class="mb-0 fs-md ft-medium lh-1">Mark Jugermi</h5>
													<span class="small">10 Oct 2021</span>
													<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum</p>
												</div>
												<div class="single_capt_right">
													<div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
													</div>
												</div>
											</div>
										</div>
										
										<!-- Single Review -->
										<div class="single_rev d-flex align-items-start py-3">
											<div class="single_rev_thumb"><img src="assets/img/team-4.jpg" class="img-fluid circle" width="90" alt="" /></div>
											<div class="single_rev_caption d-flex align-items-start pl-3">
												<div class="single_capt_left">
													<h5 class="mb-0 fs-md ft-medium lh-1">Meena Rajpoot</h5>
													<span class="small">17 Dec 2021</span>
													<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum</p>
												</div>
												<div class="single_capt_right">
													<div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
													</div>
												</div>
											</div>
										</div>
										
									</div>
									
									<div class="reviews_rate">
										<form class="row">
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
												<h4>Submit Rating</h4>
											</div>
											
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
												<div class="revie_stars d-flex align-items-center justify-content-between px-2 py-2 gray rounded mb-2 mt-1">
													<div class="srt_013">
														<div class="submit-rating">
														  <input id="star-5" type="radio" name="rating" value="star-5" />
														  <label for="star-5" title="5 stars">
															<i class="active fa fa-star" aria-hidden="true"></i>
														  </label>
														  <input id="star-4" type="radio" name="rating" value="star-4" />
														  <label for="star-4" title="4 stars">
															<i class="active fa fa-star" aria-hidden="true"></i>
														  </label>
														  <input id="star-3" type="radio" name="rating" value="star-3" />
														  <label for="star-3" title="3 stars">
															<i class="active fa fa-star" aria-hidden="true"></i>
														  </label>
														  <input id="star-2" type="radio" name="rating" value="star-2" />
														  <label for="star-2" title="2 stars">
															<i class="active fa fa-star" aria-hidden="true"></i>
														  </label>
														  <input id="star-1" type="radio" name="rating" value="star-1" />
														  <label for="star-1" title="1 star">
															<i class="active fa fa-star" aria-hidden="true"></i>
														  </label>
														</div>
													</div>
													
													<div class="srt_014">
														<h6 class="mb-0">4 Star</h6>
													</div>
												</div>
											</div>
											
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label class="medium text-dark ft-medium">Full Name</label>
													<input type="text" class="form-control" />
												</div>
											</div>
											
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label class="medium text-dark ft-medium">Email Address</label>
													<input type="email" class="form-control" />
												</div>
											</div>
											
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="medium text-dark ft-medium">Description</label>
													<textarea class="form-control"></textarea>
												</div>
											</div>
											
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
												<div class="form-group m-0">
													<a class="btn btn-white stretched-link hover-black">Submit Review <i class="lni lni-arrow-right"></i></a>
												</div>
											</div>
											
										</form>
									</div>
									
								</div> --}}
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ======================= Product Description End ==================== -->
			
			<!-- ======================= Similar Products Start ============================ -->
			<section class="middle pt-0">
				<div class="container">
					
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center">
								<h2 class="off_title">Similar Products</h2>
								<h3 class="ft-bold pt-3">Sản phẩm tương tự</h3>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="slide_items">
                                @foreach ($similarProducts as $item)
                                    <!-- single Item -->
                                    <div class="single_itesm">
                                        <div class="product_grid card b-0 mb-0">
                                            @if ($item->promotional_price > 0) 
                                                <div class="badge bg-success text-white position-absolute ft-regular ab-left text-upper">Giảm giá</div>
                                            @else
                                                <div class="badge bg-info text-white position-absolute ft-regular ab-left text-upper">Mới</div>
                                            @endif
                                            <button class="snackbar-wishlist btn btn_love position-absolute ab-right"><i class="far fa-heart"></i></button> 
                                            <div class="card-body p-0">
                                                <div class="shop_thumb position-relative">
                                                    <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="{{$item->feature_image}}" alt="..."></a>
                                                    <div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                                        <div class="edlio"><a href="{{route('prd-detail',['slug' => $item->slug])}}" class="text-white fs-sm ft-medium"><i class="fas fa-eye mr-1"></i>Xem ngay</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer b-0 p-3 pb-0 d-flex align-items-start justify-content-center">
                                                <div class="text-left">
                                                    <div class="text-center">
                                                        <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">{{$item->name}}</a></h5>
													    <div class="elis_rty">
                                                            @if ($product->promotional_price > 0)
                                                                <span class="text-muted ft-medium line-through mr-2">{{number_format($product->price,'0',',','.')}}đ</span>
                                                                <span class="ft-bold theme-cl fs-md">{{number_format($product->promotional_price,'0',',','.')}}đ</span>
                                                            @else
                                                                <span class="ft-bold theme-cl fs-md">{{number_format($product->price,'0',',','.')}}đ</span>
                                                            @endif
                                                            
                                                        </div>
                                                        
                                                        {{-- <div class="elis_rty"><span class="ft-bold fs-md text-dark">{{$item->price}}</span></div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
							</div>
						</div>
					</div>
					
				</div>
			</section>
			<!-- ======================= Similar Products Start ============================ -->
			
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
@endsection

@section('scripts')
	<script>
		$(document).ready(function() {
			// $('.add-to-cart');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				}
			});
			$(document).on('click','.add-to-cart',function(e) {
				// e.preventDefault();
				const token = $('meta[name="_token"]').attr('content');
				const url = $(this).data('url');
				const prdId = $(this).data('prd_id');
				let quantity = $("input[name=quantity]").val();
				let color = $("input[name=color]:checked").val();
				let size = $("input[name=size]:checked").val();
				console.log(token);

				$.ajax({
					method: 'POST',
					url: url,
					data: {
						color: color,
						size: size,
						quantity: quantity,
						_token: token,
					},
					dataType: 'JSON',
					
					success: function (response) {
						if(response.code === 200) {
							                  
						} 
						if(response.code === 500) {
							
						}
					},
					
					
				})
				
			// 	$.ajax({
			// 		method: 'POST',
			// 		url: url,
			// 		data: {
			// 			id: prdId,
			// 			color: color,
			// 			size: size,
			// 			quantity: quantity,
			// 			_token: token,
			// 		},
			// 		dataType: 'JSON',
			// 		success: function(response) {
			// 			console.log('xong');
			// 		},
			// 		error: function(response) {
			// 			console.log('lỗi');
			// 		}
			// 	})
			})
		})
	</script>
@endsection