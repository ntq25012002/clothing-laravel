<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $products;
    protected $orders;
    protected $v;
    public function __construct(Orders $orders,Products $products) {
        $this->products = $products;
        $this->orders = $orders;
        $this->v = [];
    }

    public function index(Request $request) {
        $filters = [];
        if(!empty($request->search_key)) {
            $filters[] = ['code','LIKE','%'.$request->search_key.'%'];
        }
        if(!empty($request->status)) {
            $filters[] = ['status',$request->status];
        }
        $orders = $this->orders->loadList($filters);
        
        $this->v['orders'] = $orders;
        return view('admin.orders.index',$this->v);
    }

    public function show($id) {
        $order = $this->orders->loadOne($id);
        $products = json_decode($order->product);

        $this->v['order'] = $order;
        $this->v['products'] = $products;
        return view('admin.orders.order-detail',$this->v);
    }

    public function update($id,Request $request) {
        try {
            $data = [
                'status' => $request->status
            ];
            $this->orders->saveUpdate($id,$data);
            return redirect()->back()->with('msg', 'Cập nhật thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('err','Cập nhật thất bại !');

        }
    }

    public function destroy($id)
    {
        try {
            $data = [
                'deleted_at' => date('Y-m-d H:i:s')
            ];
            $this->orders->remove($id,$data);
            return redirect()->back()->with('msg', 'Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('err','Xóa thất bại !');

        }
    }

    public function deleteOrders(Request $request) {
        $ids = $request->ids;
        $data = [
            'deleted_at' => date('Y-m-d H:i:s')
        ];
        $this->orders->removeMany($ids,$data);

        return redirect()->back();
    }
}
