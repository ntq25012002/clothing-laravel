<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Attributes;
use App\Models\Products;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\Discounts;

use App\Mail\OrderShipped;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $products;
    protected $attrs;
    protected $categories;
    protected $customers;
    protected $orders;
    protected $discounts;
    protected $v;
    public function __construct(Products $products, Attributes $attrs, Categories $categories, Customers $customers, Orders $orders,Discounts $discounts) {
        $this->products = $products;
        $this->categories = $categories;
        $this->attrs = $attrs;
        $this->customers = $customers;
        $this->orders = $orders;
        $this->discounts = $discounts;
        $this->v = [];
    }

    public function addToCart($id = null,$slug = null,Request $request) {
        $product = $this->products->find($id);
        $sizeAttr = $this->attrs->find($request->size);
        $colorAttr = $this->attrs->find($request->color);

        $quantity = (int)$request->quantity;
        $color = $request->color;
        $size = $request->size;
        $cart = session()->get('myCart');
        $cartQuantity = session()->get('cartQuantity');
        $quantityMax = $product->quantity;
       
        if(isset($cartQuantity[$id]) && ((int)$request->quantity + $cartQuantity[$id]['quantity']) > $quantityMax) {
            return response()->json([
                'status' => 500,
                'message' => 'Số lượng sản phẩm vượt quá trong kho!'
            ]);
        }
        
        if(isset($cart[$id.$color.$size]) && $cart[$id.$color.$size]['color'] == $colorAttr->value && $cart[$id.$color.$size]['size'] == $sizeAttr->value) {
            $cart[$id.$color.$size]['quantity'] = $cart[$id.$color.$size]['quantity'] + $quantity;
        }else{
            $cart[$id.$color.$size] = [
                'id' => $id,
                'name' => $request->name,
                'image' => $product->feature_image,
                'price' => $request->price,
                'colorId' => $color,
                'color' => $colorAttr->value,
                'sizeId' => $size,
                'size' => $sizeAttr->value,
                'quantity' => (int)$request->quantity,
            ];
        }
        if(isset($cartQuantity[$id])) {
            $cartQuantity[$id]['quantity'] = $cartQuantity[$id]['quantity'] + $quantity;
        }else{
            $cartQuantity[$id] = [
                'id' => $id,
                'quantity' => (int)$request->quantity,
            ];
        }

        session()->put('myCart',$cart);
        session()->put('cartQuantity',$cartQuantity);
        
        $html = $this->renderCart();
        session()->put('totalItemPrd',$html['totalItemPrd']);
        session()->put('total',$html['total']);
        return response()->json([
            'out' => $html['out'],
            'totalItemPrd' => $html['totalItemPrd'],
            'total' => $html['total'],
            'cartQuantity' => session()->get('cartQuantity'),
        ]);
    }

    public function removeCartItem($id, $idPrd) {
        $cart = session()->get('myCart');
        $cartQuantity = session()->get('cartQuantity');
        if(isset($cartQuantity[$idPrd])) {
            unset($cartQuantity[$idPrd]);
            session()->put('cartQuantity',$cartQuantity);
        }
        if(isset($cart[$id])) {
            // session()->forget('myCart');
            unset($cart[$id]);
            session()->put('myCart',$cart);
            $totalItemPrd = 0;
            $total = 0;
            foreach(session()->get('myCart') as $item) {
                $totalItemPrd += $item['quantity'];
                $total += $item['price'] * $item['quantity'];
            }
            session()->put('totalItemPrd',$totalItemPrd);
            session()->put('total',$total);
           
            return response()->json([
                'status' => 200,
                'message' => 'Successfully',
                'totalItemPrd' => $totalItemPrd,
                'total' => number_format($total,'0',',','.'). ' đ',
            ]);
        }else{
            return response()->json([
                'status' => 500,
                'message' => 'Error'
            ]);
        }
    }

    public function renderCart() {
        $total = 0;
        $totalItemPrd = 0;
        $out = '';
        $cartQuantity = session()->get('cartQuantity');
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
                            <div class="fls_last"><button class="close_slide gray btn_remove" data-url_delete="'.route('remove-cart-item',['id' => $key ,'idPrd' => $item['id']]).'"><i class="ti-close"></i></button></div>
                        </div>';
                $totalItemPrd += $item['quantity'];
                $total += $item['price'] * $item['quantity'];
            }
            $out .= '<div class="d-flex align-items-center justify-content-between br-top br-bottom px-3 py-3">
                        <h6 class="mb-0">Tổng tiền:</h6>
                        <h3 class="mb-0 ft-medium" id="total-price">'.number_format($total,'0',',','.').' đ</h3>
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
        return [
            'out' => $out,
            'totalItemPrd' => $totalItemPrd,
            'total' => $total,
            'cartQuantity' => $cartQuantity,
        ];
    }

    public function showCart(Request $request) {
        
        $categories = $this->categories->where('status',1)->get();
        $categoryTree = $this->categoryTree($categories,0);
        $this->v['categories'] = $categoryTree;

        return view('client.shopping-cart',$this->v);
    }

    public function updateCart(Request $request) {
        // dd($request->all());
        // dd($request->discount);
        // dd(date('Y-m-d H:i:s'));
        if(!empty($request->discount)) {
            $discount = $this->discounts->wher('name',$request->discount)->get();

                                    // ->where([
                                    //         ['name',$request->discount],
                                    //         ['status',1],
                                    //         ['time_start','<=',date('Y-m-d H:i:s')],
                                    //         ['time_end','>=',date('Y-m-d H:i:s')],
                                    //         ['deleted_at',null],
                                    //     ])->get();
            dd($discount);
            if(!empty($discount)) {
                return response()->json([
                    'status' => '200',
                    'message' => 'Áp dụng mã khuyến mại thành công!',
                    'discount' => $discount,
                    // 'type' => $discount->type
                ]);
            }else{
                return response()->json([
                    'status' => '500',
                    'message' => 'Mã khuyến mại hết hạn hoặc đã được sử dụng'
                ]);
            }
        }
        else if(!isset($request->discount)) {
            $params = [];
            $cart = session()->get('myCart');
            if(isset($cart)) {
                $params['cols'] = array_map(function ($item) {
                    if($item == '') {
                        $item == null;
                    }elseif(is_string($item)){
                        $item = trim($item);
                        return $item;
                    }
                }, $request->all());
                unset($params['cols']['_token']);
                // dd($params['cols']);
                $cartId = [];
                foreach ($params['cols'] as $key => $value) {
                    $cartId[] = $key;
                }
                // dd($cartId);
                foreach ($cart as $keyCart => $item) {
                    if(in_array($keyCart, $cartId)) {
                        $cart[$keyCart]['quantity'] = (int)$params['cols'][$keyCart];
                    }else{
                        unset($cart[$keyCart]);
                    }
                }
                $totalItemPrd = 0;
                $total = 0;
                foreach($cart as $item) {
                    $totalItemPrd += $item['quantity'];
                    $total += $item['price'] * $item['quantity'];
                }
                // dd($cart,session()->get('myCart'));
            }

            session()->put('myCart',$cart);
            session()->put('totalItemPrd',$totalItemPrd);
            session()->put('total',$total);
            // dd(session()->get('myCart'));
            return redirect()->route('shopping-cart')->with('msg','Cập nhật giỏ hàng thành công!');
        }
        
    }

    public function checkOut() {
        $categories = $this->categories->where('status',1)->get();
        $categoryTree = $this->categoryTree($categories,0);
        $this->v['categories'] = $categoryTree;

        $cart = session()->get('myCart');
        $totalItemPrd = session()->get('totalItemPrd');
        $total = session()->get('total');
        $this->v['cart'] = $cart;
        $this->v['totalItemPrd'] = $totalItemPrd;
        $this->v['total'] = $total;
        return view('client.checkout',$this->v);
    }

    public function postCheckOut(OrderRequest $request) {
        try {
            DB::beginTransaction();
            $params = [];
            $params['cols'] = array_map(function ($item) {
                if($item == '') {
                    $item == null;
                }elseif(is_string($item)){
                    $item = trim($item);
                    return $item;
                }
            }, $request->all());
            if(Auth::check()) {
                $params['cols']['user_id'] = Auth::user()->id;
            }
            unset($params['cols']['_token']);
            unset($params['cols']['payment']);
            unset($params['cols']['note']);
            $customer = $this->customers->create($params['cols']);
            $cart = session()->get('myCart');
            $amount = session()->get('totalItemPrd');
            $total = session()->get('total');
            // dd($cart);
            $dataOrders = [
                'customer_id' => $customer->id,
                'code' => 'KUM'.time(),
                'product' => json_encode($cart),
                'amount' => $amount,
                'total' => $total,
                'status' => 0,
                'payment' => $request->payment,
                'note' => $request->note,
            ];
            $order = $this->orders->create($dataOrders);
           
            DB::commit();
            if(!empty($order)) {
                $contentEmail = new OrderShipped([
                    'customer' => $customer,
                    'myCart'=> session()->get('myCart'),
                    'total' => session()->get('total'),
                    'dataOrders' => $dataOrders
                ]);
                Mail::to($request->email)->send($contentEmail);

                session()->forget(['myCart','total','totalItemPrd']);
                return redirect()->route('complete-order')->with('code', $order->code);
            }else{
                return redirect()->back()->with('err','Lỗi đặt hàng');
            } 

            session()->forget(['myCart','total','totalItemPrd']);
            return redirect()->route('complete-order')->with('code', $order->code);
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->route('checkout')->with('err','Lỗi đặt hàng');
        }
    }

    public function completeOrder() {
        $categories = $this->categories->where('status',1)->get();
        $categoryTree = $this->categoryTree($categories,0);
        $this->v['categories'] = $categoryTree;
        return view('client.complete-order',$this->v);
    }
     // Đệ quy danh mục
     public function categoryTree($data, $parent_id = 0, $level = 0) {
        $result = [];
        foreach ($data as $item) {
            if($item['parent_id'] == $parent_id) {
                $item['level'] = $level;
                $result[] = $item;
                // unset($data[$item['id']]);
                $child = $this->categoryTree($data, $item['id'], $level + 1);
                $result = array_merge($result, $child);
            }
        }
        return $result;
    }
}
