@extends('client.layouts.main')

@section('content')
<!-- ======================= Top Breadcrubms ======================== -->
    <div class="gray py-3">
        <div class="container">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Support</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
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
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-between">
                <div class="col-12 col-lg-7 col-md-12">
                    <form>
                        <h5 class="mb-4 ft-medium">Billing Details</h5>
                        <div class="row mb-2">
                            
                            {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="text-dark">First Name *</label>
                                    <input type="text" class="form-control" placeholder="First Name" />
                                </div>
                            </div>
                            
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="text-dark">Last Name *</label>
                                    <input type="text" class="form-control" placeholder="Last Name" />
                                </div>
                            </div> --}}
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="text-dark">Họ tên *</label>
                                    <input type="text" class="form-control" placeholder="Họ tên" />
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="text-dark">Email *</label>
                                    <input type="email" class="form-control" placeholder="Email" />
                                </div>
                            </div>
                            
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="text-dark">Số điện thoại *</label>
                                    <input type="text" class="form-control" placeholder="Số điện thoại" />
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="text-dark">Địa chỉ *</label>
                                    <input type="text" class="form-control" placeholder="Địa chỉ nhận hàng" />
                                </div>
                            </div>
                            
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="text-dark">Ghi chú</label>
                                    <textarea class="form-control ht-50"></textarea>
                                </div>
                            </div>
                            
                        </div>
                        
                        
                        <h5 class="mb-4 ft-medium">Phương thức thanh toán</h5>
                        <div class="row mb-4">
                            <div class="col-12 col-lg-12 col-xl-12 col-md-12">
                                <div class="panel-group pay_opy980" id="payaccordion">
                                    <!-- Thanh toán khi nhận hàng -->
                                    <div class="panel panel-default border">
                                        <div class="panel-heading" id="pay">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" role="button" data-parent="#payaccordion" href="#cod" aria-expanded="true"  aria-controls="payPal" class="">
                                                    Thanh toán khi nhận hàng<img src="{{asset('client/assets/img/paypal.html')}}" class="img-fluid" alt="">
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="cod" class="panel-collapse collapse " aria-labelledby="pay" data-parent="#payaccordion">
                                            {{-- <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="text-dark">PayPal Email</label>
                                                    <input type="text" class="form-control simple" placeholder="paypal@gmail.com">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-dark btm-md full-width">Pay 400.00 USD</button>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <!-- Pay By Paypal -->
                                    <div class="panel panel-default border">
                                        <div class="panel-heading" id="pay">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" role="button" data-parent="#payaccordion" href="#payPal" aria-expanded="false"  aria-controls="payPal" class="">
                                                    PayPal<img src="{{asset('client/assets/img/paypal.html')}}" class="img-fluid" alt="">
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="payPal" class="panel-collapse collapse " aria-labelledby="pay" data-parent="#payaccordion">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="text-dark">PayPal Email</label>
                                                    <input type="text" class="form-control simple" placeholder="paypal@gmail.com">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-dark btm-md full-width">Pay 400.00 USD</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Pay By Strip -->
                                    <div class="panel panel-default border">
                                        <div class="panel-heading" id="stripes">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" role="button" data-parent="#payaccordion" href="#stripePay" aria-expanded="false"  aria-controls="stripePay" class="">
                                                    Stripe<img src="{{asset('client/assets/img/strip.html')}}" class="img-fluid" alt="">
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="stripePay" class="collapse" aria-labelledby="stripes" data-parent="#payaccordion">
                                            <div class="panel-body">
                                            
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="text-dark">Card Holder Name *</label>
                                                            <input type="text" class="form-control" placeholder="Dhananjay Preet" />
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="text-dark">Card Number *</label>
                                                            <input type="text" class="form-control" placeholder="5426 4586 5485 4759" />
                                                        </div>
                                                    </div>									
                                                
                                                    <div class="col-lg-5 col-md-5 col-sm-6">
                                                        <div class="form-group">
                                                            <label class="text-dark">Expire Month *</label>
                                                            <select class="custom-select">
                                                                <option value="1" selected="">January</option>
                                                                <option value="2">February</option>
                                                                <option value="3">March</option>
                                                                <option value="4">April</option>
                                                                <option value="5">May</option>
                                                                <option value="6">June</option>
                                                                <option value="7">July</option>
                                                                <option value="8">August</option>
                                                                <option value="9">September</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-5 col-md-5 col-sm-6">
                                                        <div class="form-group">
                                                            <label class="text-dark">Expire Year *</label>
                                                            <select class="custom-select">
                                                                <option value="1" selected="">2010</option>
                                                                <option value="2">2018</option>
                                                                <option value="3">2019</option>
                                                                <option value="4">2020</option>
                                                                <option value="5">2021</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="text-dark">CVC *</label>
                                                            <input type="text" class="form-control" placeholder="CVV*">
                                                        </div>
                                                    </div>										
                                                    
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input id="ak-2" class="checkbox-custom" name="ak-2" type="checkbox">
                                                            <label for="ak-2" class="checkbox-custom-label">By Continuing, you ar'e agree to conditions</label>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="form-group text-center">
                                                            <a href="#" class="btn btn-dark full-width">Pay 202.00 USD</a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Pay By Debit or credtit -->
                                    <div class="panel panel-default border">
                                        <div class="panel-heading" id="dabit">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" href="#payaccordion" data-target="#debitPay" aria-expanded="false"  aria-controls="debitPay" class="">
                                                    Debit Or Credit<img src="{{asset('client/assets/img/debit.html')}}" class="img-fluid" alt="">
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="debitPay" class="panel-collapse collapse" aria-labelledby="dabit" data-parent="#payaccordion">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="text-dark">Card Holder Name *</label>
                                                            <input type="text" class="form-control" placeholder="Card Holder Name" />
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="text-dark">Card Number *</label>
                                                            <input type="text" class="form-control" placeholder="7589 6356 8547 9120" />
                                                        </div>
                                                    </div>									
                                                
                                                    <div class="col-lg-5 col-md-5 col-sm-6">
                                                        <div class="form-group">
                                                            <label class="text-dark">Expire Month *</label>
                                                            <select class="custom-select">
                                                                <option value="1" selected="">January</option>
                                                                <option value="2">February</option>
                                                                <option value="3">March</option>
                                                                <option value="4">April</option>
                                                                <option value="5">May</option>
                                                                <option value="6">June</option>
                                                                <option value="7">July</option>
                                                                <option value="8">August</option>
                                                                <option value="9">September</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-5 col-md-5 col-sm-6">
                                                        <div class="form-group">
                                                            <label class="text-dark">Expire Year *</label>
                                                            <select class="custom-select">
                                                                <option value="1" selected="">2010</option>
                                                                <option value="2">2018</option>
                                                                <option value="3">2019</option>
                                                                <option value="4">2020</option>
                                                                <option value="5">2021</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                                        <div class="form-group">
                                                            <label class="text-dark">CVC *</label>
                                                            <input type="text" class="form-control" placeholder="CVV*" />
                                                        </div>
                                                    </div>										
                                                    
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input id="al-2" class="checkbox-custom" name="al-2" type="checkbox">
                                                            <label for="al-2" class="checkbox-custom-label">By Continuing, you ar'e agree to conditions</label>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="form-group text-center">
                                                            <a href="#" class="btn btn-dark full-width">Pay 202.00 USD</a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
                
                <!-- Sidebar -->
                <div class="col-12 col-lg-4 col-md-12">
                    <div class="d-block mb-3">
                        <h5 class="mb-4">Sản phẩm ({{$totalItemPrd}})</h5>
                        <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x mb-4">
                            @foreach ($cart as $item)
                                <li class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-3">
                                            <!-- Image -->
                                            <a href="product.html"><img src="{{$item['image']}}" alt="..." class="img-fluid"></a>
                                        </div>
                                        <div class="col d-flex align-items-center">
                                            <div class="cart_single_caption pl-2">
                                                <h4 class="product_title fs-md ft-medium mb-1 lh-1">{{$item['name']}}</h4>
                                                <p class="mb-1 lh-1"><span class="text-dark">Kích cỡ: {{$item['size']}}</span></p>
                                                <p class="mb-3 lh-1"><span class="text-dark">
                                                    Màu: 
                                                    <span style="display: inline-block;background-color:{{$item['color']}};width:14px;height:14px;margin-bottom:-3px"></span>
                                                </p>
                                                <h4 class="fs-md ft-medium mb-3 lh-1">{{number_format($item['price'])}} đ x {{$item['quantity']}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <div class="card mb-4 gray">
                        <div class="card-body">
                        <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                            <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                <span>Subtotal</span> <span class="ml-auto text-dark ft-medium">{{number_format($total,'0',',','.')}} đ</span>
                            </li>
                            <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                <span>Tax</span> <span class="ml-auto text-dark ft-medium">$10.10</span>
                            </li>
                            <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                <span>Tổng tiền</span> <span class="ml-auto text-dark ft-medium">{{number_format($total,'0',',','.')}} đ</span>
                            </li>
                            <li class="list-group-item fs-sm text-center">
                                {{-- Shipping cost calculated at Checkout * --}}
                            </li>
                        </ul>
                        </div>
                    </div>
                    
                    <a class="btn btn-block btn-dark mb-3" href="{{route('complete-order')}}">Xác nhận đặt hàng</a>
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
                            <h5 class="mb-0">Thanh toán</h5>
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