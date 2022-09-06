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
        if(!empty($request->phone)) {
            $filters[] = ['phone','LIKE','%'.$request->phone.'%'];
        }
        if(!empty($request->email)) {
            $filters[] = ['email','LIKE','%'.$request->email.'%'];
        }
        $customers = $this->customers->loadList($filters);
        $this->v['customers'] = $customers;
        return view('admin.customers.index',$this->v);
    }

    public function show($id) {
        $customer = $this->customers->loadOne($id);
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
            $data = [
                'deleted_at' => date('Y-m-d H:i:s')
            ];
            $this->customers->remove($id,$data);
            return redirect()->back()->with('msg', 'Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('err','Xóa thất bại !');

        }
    }

    public function deleteCustomers(Request $request) {
        $ids = $request->ids;
        $data = [
            'deleted_at' => date('Y-m-d H:i:s')
        ];
        $this->customers->removeMany($ids,$data);

        return redirect()->back();
    }
}
