<div id="cartList">
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
                                <div class="fls_last"><button class="close_slide gray btn_remove" data-url_delete="{{route('remove-cart-item',['id' => $key ])}}"><i class="ti-close"></i></button></div>
                            </div>
                        @endforeach
                        <div class="d-flex align-items-center justify-content-between br-top br-bottom px-3 py-3">
                            <h6 class="mb-0">Tổng tiền:</h6>
                            <h3 class="mb-0 ft-medium" id="total-price">{{number_format(session()->get('total'),'0',',','.')}} đ</h3>
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
</div>