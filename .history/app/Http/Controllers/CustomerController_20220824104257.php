<?php

namespace App\Http\Controllers;
use App\Models\Orders;
use App\Models\Customers;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customers;
    protected $orders;
    protected $v;
    public function __construct(Customers $customers,Orders $orders) {
        $this->customers = $customers;
        $this->orders = $orders;
        $this->v = [];
    }
    public function index(Request $request) {
        $filters = [];
        if(!empty($request->search_key)) {
            $filters[] = ['name','LIKE','%'.$request->search_key.'%'];
        }
        $customers = $this->customers->where('deleted_at',null)->orderBy('created_at','DESC')->get();
        $this->v['customers'] = $customers;
        return view('admin.customers.index',$this->v);
    }

    public function show($id) {
        $customer = $this->customers->where('deleted_at',null)->find($id);
        $this->v['customer'] = $customer;
        return view('admin.customers.customer-detail',$this->v);
    }

    // public function update($id,Request $request) {
    //     try {
    //         $this->customers->find($id)->update([
    //             'status' => $request->status
    //         ]);
    //         return redirect()->back()->with('msg', 'Cập nhật thành công');
    //     } catch (\Throwable $th) {
    //         return redirect()->back()->with('err','Cập nhật thất bại !');

    //     }
    // }

    public function destroy($id)
    {
        try {
            $this->customers->find($id)->update([
                'deleted_at' => date('Y-m-d H:i:s')
            ]);
            return redirect()->back()->with('msg', 'Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('err','Xóa thất bại !');

        }
    }

    public function deleteCustomers(Request $request) {
        $ids = $request->ids;
        $this->customers->whereIn('id',$ids)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->back();
    }
}
