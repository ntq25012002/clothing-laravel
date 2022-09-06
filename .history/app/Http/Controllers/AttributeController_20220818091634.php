<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attributes;

class AttributeController extends Controller
{
    protected $attr;
    public function __construct(Attributes $attr) {
        $this->attr = $attr;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attrs = $this->attr->where('deleted_at',null)->orderBy('name', 'DESC')->get();;
        // dd($attrs);
        return view('admin.products.attribute.index',[
            'attrs' => $attrs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.attribute.create-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = [
            'name' => $request->attr,
            'value' => $request->size != null ? $request->size : $request->color
        ];
        $res = $this->attr->create($data);
        if($res->count() > 0) {
            return redirect()->route('admin.attribute.create-form')->with('msg', 'Thêm mới thành công');
        }else{
            return redirect()->route('admin.atttribute.create-form')->with('err', 'Thêm mới thất bại');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $attr = $this->attr->find($id);
        return view('admin.products.attribute.edit-form',[
            'attr' => $attr,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $data = [
            'name' => $request->attr,
            'value' => $request->size != null ? $request->size : $request->color
        ];
        $res = $this->attr->find($id)->update($data);
        if($res->count() > 0) {
            return redirect()->route('admin.attribute.edit-form')->with('msg', 'Cập nhật thành công');
        }else{
            return redirect()->route('admin.atttribute.edit-form')->with('err', 'Cập nhật thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->attr->find($id)->delete();
        return redirect()->back();
    }

    
    public function deleteAttributes(Request $request)
    {
        // dd($request->ids);
        $ids = $request->ids;
        $this->attr->whereIn('id',$ids)->update([
            'status' => 0
        ]);

        return redirect()->back();
    }

}
