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
        //
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

        Sliders::create($data);
        return redirect()->back()->with('msg','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = Sliders::find($id);
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
        //
        $sliderOld = Sliders::find($id);
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

        $sliderOld->update($dataUpdate);
        return redirect()->back()->with('msg','Thêm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sliders::where('id', $id)->update([
            'status' => 0
        ]);
        return redirect()->back()->with('msg','Xóa thành công');
    }

    public function deleteSliders(Request $request) {

    }
}
