<div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="Search">
    <div class="rightMenu-scroll">
        <div class="d-flex align-items-center justify-content-between slide-head py-3 px-3">
            <h4 class="cart_heading fs-md ft-medium mb-0">Search Products</h4>
            <button onclick="closeSearch()" class="close_slide"><i class="ti-close"></i></button>
        </div>
            
        <div class="cart_action px-3 py-4">
            <form action="{{route('product-list')}}" class="form m-0 p-0">
                <div class="form-group">
                    <select name="category" class="custom-select">
                        <option value="" selected="">Chọn danh mục</option>
                        @foreach ($categories as $cate)
                            <option value="{{$cate['slug']}}">{{str_repeat('---',$cate['level']). ' ' . $cate['name']}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <input type="text" name="product" class="form-control" placeholder="Tên sản phẩm.." />
                </div>
               
                <div class="form-group mb-0">
                    <button type="submit" class="btn d-block full-width btn-dark">Tìm sản phẩm</button>
                </div>
            </form>
        </div>
        
        {{-- <div class="d-flex align-items-center justify-content-center br-top br-bottom py-2 px-3">
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
         --}}
    </div>
</div>