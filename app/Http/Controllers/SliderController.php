<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sliders;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\Storage;
// use str;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    protected $silders;
    public function __construct(Sliders $sliders) {
        $this->sliders = $sliders;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = [];
        if(!empty($request->search_key)) {
            $filters[] = ['title','LIKE','%'.$request->search_key.'%'];
        }
        $sliders = $this->sliders->loadList($filters);
        return view('admin.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        if($request->hasFile('imageFile')) {
            $file = $request->file('imageFile');
            $fileNameOriginal = $file->getClientOriginalName();
            $fileNameHash = str::random(20) . $file->getExtension();
            $filePath = $file->storeAs('public/sliders',$fileNameHash);
            $dataImage = [
                'fileName' => $fileNameHash,
                'filePath' => Storage::url($filePath),
            ];
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'image_name' => $dataImage['fileName'],
            'image_path' => $dataImage['filePath'],
        ];

        $slider = $this->sliders->saveNew($data);
        if($slider) {
            return redirect()->back()->with('msg','Thêm thành công');
        }else{
            return redirect()->back()->with('err','Lỗi thêm mới');
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
        $slider = $this->sliders->loadOne($id);
        return view('admin.sliders.edit-form',compact('slider'));
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
    public function update(SliderRequest $request, $id)
    {
        $sliderOld = $this->sliders->loadOne($id);
        if($request->hasFile('imageFile')) {
            $file = $request->file('imageFile');
            $fileNameOriginal = $file->getClientOriginalName();
            $fileNameHash = str::random(20) . $file->getExtension();
            $filePath = $file->storeAs('public/sliders',$fileNameHash);
            $dataImage = [
                'fileName' => $fileNameHash,
                'filePath' => Storage::url($filePath),
            ];
        }else{
            $dataImage = [
                'fileName' => $sliderOld->image_name,
                'filePath' => $sliderOld->image_path,
            ];
        }

        $dataUpdate = [
            'title' => $request->title,
            'description' => $request->description,
            'image_name' => $dataImage['fileName'],
            'image_path' => $dataImage['filePath'],
        ];

        $this->sliders->saveUpdate($id,$dataUpdate);
        return redirect()->back()->with('msg','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = [
            'status' => 0
        ];
        $this->sliders->remove($id,$data);
        return redirect()->back()->with('msg','Xóa thành công');
    }

    public function deleteSliders(Request $request) {
        $ids = $request->ids;
        $data = [
            'status' => 0
        ];
        $this->sliders->removeMany($ids,$data);
        return redirect()->back();
    }
}
