<?php

namespace App\Http\Controllers;

use App\Models\Discounts;
use Illuminate\Http\Request;
use App\Http\Requests\DiscountRequest;
class DiscountController extends Controller
{

    protected $discounts;
    public function __construct(Discounts $discounts) {
        $this->discounts = $discounts;
    }

    public function index() {
        $discounts = $this->discounts->where('deleted_at',null)->get();
        return view('admin.discounts.index',[
            'discounts' => $discounts,
        ]);
    }

    public function create() {
        return view('admin.discounts.form-create');
    }

    public function store(DiscountRequest $request)
    {
        // dd($request->all());
        $timeStart = date('Y-m-d H:i:s',strtotime($request->input('start')));
        $timeEnd = date('Y-m-d H:i:s',strtotime($request->input('end')));
        $data = [
            'name' => $request->name,
            'type' => $request->type,
            'value' => $request->value,
            'time_start' => $timeStart,
            'time_end' => $timeEnd,
        ];
        $discount = $this->discounts->create($data);
        if($discount) {
            return redirect()->route('admin.discount.create-form')->with('msg','Thêm mới thành công!');
        }else{
            return redirect()->route('admin.discount.create-form')->with('err','Lỗi thêm mới!');
        }
    }

    public function show($id)
    {
        $discount = $this->discounts->find($id);
        $this->v['discount'] = $discount;
        return view('admin.discounts.form-edit',$this->v);
    }

    public function update(Request $request, $id){
        // dd($request->all());
        $timeStart = date('Y-m-d H:i:s',strtotime($request->input('start')));
        $timeEnd = date('Y-m-d H:i:s',strtotime($request->input('end')));
        $data = [
            'name' => $request->name,
            'type' => $request->type,
            'value' => $request->value,
            'time_start' => $timeStart,
            'time_end' => $timeEnd,
        ];
        $discount = $this->discounts->where('id', $id)->update($data);
        if($discount) {
            return redirect()->route('admin.discount.edit-form',['id' => $id])->with('msg','Cập nhật thông tin thành công!');
        }else{
            return redirect()->route('admin.discount.edit-form',['id' => $id])->with('err','Lỗi cập nhật!');
        }
    }

    public function destroy($id)
    {
        try {
            $this->discounts->find($id)->update([
                'deleted_at' => date('Y-m-d H:i:s')
            ]);
            return redirect()->back()->with('msg', 'Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('err','Xóa thất bại !');

        }
    }

    public function deleteDiscounts(Request $request) {
        $ids = $request->ids;
        $this->discounts->whereIn('id',$ids)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->back();
    }
}
