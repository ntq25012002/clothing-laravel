<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Attributes;
use App\Models\Products;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $products;
    protected $attrs;
    protected $categories;
    public function __construct(Products $products, Attributes $attrs, Categories $categories) {
        $this->products = $products;
        $this->categories = $categories;
        $this->attrs = $attrs;
    }

    public function addToCart($id = null,$slug = null,Request $request) {
        // Session::flush();
        // session()->forget('myCart');
        // dd(session()->get('myCart'),'endif');
        $product = $this->products->find($id);
        $sizeAttr = $this->attrs->find($request->size);
        $colorAttr = $this->attrs->find($request->color);
        $quantity = (int)$request->quantity;
        $color = $request->color;
        $size = $request->size;
        $cart = session()->get('myCart');
        
        if(isset($cart[$id.$color.$size]) && $cart[$id.$color.$size]['color'] == $colorAttr->value && $cart[$id.$color.$size]['size'] == $sizeAttr->value) {
            $cart[$id.$color.$size]['quantity'] = $cart[$id.$color.$size]['quantity'] + $quantity;
        }else{
            $cart[$id.$color.$size] = [
                'name' => $request->name,
                'image' => $product->feature_image,
                // 'product-quantity' => $product->quantity,
                'price' => $request->price,
                'color' => $colorAttr->value,
                'size' => $sizeAttr->value,
                'quantity' => (int)$request->quantity,
            ];
        }
        session()->put('myCart',$cart);
        
        $total = 0;
        $totalItemPrd = 0;
        $out = '';
		if (!empty(session()->get('myCart')) && count(session()->get('myCart')) > 0) {
            foreach(session()->get('myCart') as $key => $item) {
                $out .= '<div class="d-flex align-items-center justify-content-between br-bottom px-3 py-3">
                            <div class="cart_single d-flex align-items-center">
                                <div class="cart_selected_single_thumb">
                                    <a href="#"><img src="'.asset($item['image']).'" width="60" class="img-fluid" alt="" /></a>
                                </div>
                                <div class="cart_single_caption pl-2">
                                    <h4 class="product_title fs-sm ft-medium mb-0 lh-1">'.$item['name'].'</h4>
                                    <p class="mb-2"><span class="text-dark ft-medium small">'.$item['size'].'</span>, <span class="text-dark small" style="display:inline-block; margin-bottom: -3px; background-color: '.$item['color'].';width:12px;height:12px"></span></p>
                                    <h4 class="fs-md ft-medium mb-0 lh-1" id="prd_quantity'.$key.'" data-prd_quantity'.$key.'= '.$item['quantity'].'>'.number_format($item['price'],'0',',','.').'đ x '.$item['quantity'].'</h4>
                                </div>
                            </div>
                            <div class="fls_last"><button class="close_slide gray"><i class="ti-close"></i></button></div>
                        </div>';
                $totalItemPrd += $item['quantity'];
                $total += $item['price'] * $item['quantity'];
            }
            $out .= '<div class="d-flex align-items-center justify-content-between br-top br-bottom px-3 py-3">
                        <h6 class="mb-0">Tổng tiền:</h6>
                        <h3 class="mb-0 ft-medium">'.number_format($total,'0',',','.').' đ</h3>
                    </div>
                    
                    <div class="cart_action px-3 py-3">
                        <div class="form-group">
                            <a href="'.route('checkout').'" class="btn d-block full-width btn-dark">Thanh toán</a>
                        </div>
                        <div class="form-group">
                            <a href="'.route('shopping-cart').'" class="btn d-block full-width btn-dark-light">Chi tiết giỏ hàng</a>
                        </div>
                    </div>';
        }else{
            $out = '<h3 class="text-center mt-2">Giỏ hàng trống</h3>';
        }
        session()->put('totalItemPrd',$totalItemPrd);
        // session()->put('total',$total);
        return response()->json([
            'out' => $out,
            'totalItemPrd' => $totalItemPrd,
            'total' => $total
        ]);
    }

    public function showCart() {
        return view('client.shopping-cart');
    }

    public function checkOut() {
        return view('client.checkout');
    }

    public function completeOrder() {
        return view('client.complete-order');
    }
}
