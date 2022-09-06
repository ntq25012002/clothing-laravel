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
        $attrs = $this->attr->where('deleted_at',null)->get();
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
            'value' => $request->color != null ? $request->color : $request->size
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
        dd($id);
        return view('admin.products.attribute.edit-form');
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
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->attr->delete($id);
    }
}
