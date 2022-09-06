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

    public function index() {
        $orders = $this->orders->where('deleted_at',null)->orderBy('created_at','DESC')->get();
        $this->v['orders'] = $orders;
        return view('admin.orders.index',$this->v);
    }

    public function show($id) {
        $order = $this->orders->where('deleted_at',null)->find($id);
        $products = json_decode($order->product);
        // foreach($products as $item) {
        //     dd($item->name);
            
        // }
        $this->v['order'] = $order;
        $this->v['products'] = $products;
        return view('admin.orders.order-detail',$this->v);
    }

    // public function destroy($id) {
    //     try {
    //         $this->orders->where('id',$id)->delete();
    //         return redirect()->back()->with('msg','Xóa thành công !');
    //     } catch (\Throwable $th) {
    //         return redirect()->back()->with('err','Xóa thất bại !');
    //     }       
    // }

    public function destroy($id)
    {
        try {
            $this->orders->find($id)->update([
                'deleted_at' => date('Y-m-d H:i:s')
            ]);
            return redirect()->back()->with('msg', 'Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('err','Xóa thất bại !');

        }
    }

    
    public function deleteOrders(Request $request) {
        $ids = $request->ids;
        $this->orders->whereIn('id',$ids)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->back();
    }
}
