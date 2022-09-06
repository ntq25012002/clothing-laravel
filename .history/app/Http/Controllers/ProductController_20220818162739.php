<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Tags;
use App\Models\ProductTags;
use App\Models\Attributes;
use App\Http\Requests\ProductRequest;
use App\Models\ProductImages;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tags::all();
        $products = Products::where('status',1)
        ->orderBy('id')
        ->paginate(8);
        return view('admin.products.product.index',[
            'products' => $products,
            'tags' => $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = Categories::all();
        $categoryTree = $this->categoryTree($categories,0);
        $colorAttrs = Attributes::where('deleted_at',null)->where('name','color')->get();
        $sizeAttrs = Attributes::where('deleted_at',null)->where('name','size')->get();
        return view('admin.products.product.create-form',[
            'categories' => $categories,
            'categoryTree' => $categoryTree,
            'colorAttrs' => $colorAttrs,
            'sizeAttrs' => $sizeAttrs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // dd($request->all());
        try {
            // DB::beginTransaction() -> Bắt đầu thực hiện transaction (xử lý có tuần tự các thao tác trên cơ sở dữ liệu)
            DB::beginTransaction();
                if($request->hasFile('feature_image')){
                    $file = $request->file('feature_image');
                    $fileNameOriginal = $file->getClientOriginalName();
                    $fileNameHash = $file->getClientOriginalExtension().'_'.time();
                    $filePath = $file->storeAs('public/product/'.Auth::user()->id,$fileNameHash);
                    $dataFeatureImages = [
                        'file_name' => $fileNameHash,
                        'file_path' => Storage::url($filePath),
                    ];
                }
                $data = [
                    'name' => $request->name,
                    'price' => $request->price,
                    'promotional_price' => $request->promotional_price,
                    'quantity' => $request->quantity,
                    'feature_image' => $dataFeatureImages['file_path'],
                    'description' => $request->description,
                    'category_id' => $request->category_id,
                    'slug' => $request->slug ? str::slug($request->slug) : str::slug($request->name),
                ];
                $product = Products::create($data);
                // dd($product);
                if($request->hasFile('images')) {
                    if( is_array($request->images) && !empty($request->images)) {
                        foreach($request->images as $imageItem) {
                            $fileNameOriginal = $imageItem->getClientOriginalName();
                            $fileNameHash = str::random(20) . '.' . $imageItem->getClientOriginalExtension();
                            $filePath = $imageItem->storeAs('public/product/'.Auth::user()->id,$fileNameHash);
                            $dataDetailImages = [
                                'file_name' => $fileNameHash,
                                'file_path' => Storage::url($filePath),
                            ];
                            // $product->phuong_thuc_trung_gian()->create([]);
                            $product->images()->create([
                                'image' => $dataDetailImages['file_name'],
                            ]);
                        }
                        // $product->images()->insert($images);
                    }
                }

                if($request->attrs && !empty($request->attrs)) {
                    // $attrIds = [];
                    // // foreach($request->attrs as $item) {
                    // //     $attrIds[] = $item->id;
                    // // }
                    $product->attributes()->attach($request->attrs);
                }

                if(!empty($request->tags)) {
                    foreach($request->tags as $tagItem) {
                        // Nếu $tagItem đã có trong database thì hợp nhất với bản ghi đó, nếu ko có thì tạo mới
                        $tag = Tags::firstOrCreate(['name'=>$tagItem]);
                        // $productTag = ProductTags::create([
                        //     'product_id' => $product->id,
                        //     'tag_id' => $tag->id,
                        // ]);
                        $tagIds[] = $tag->id; // Lưu id vào 1 mảng để thêm vào table tag
                    }
                    // Gắn tag_id vào table tags (để gắn cả created_at và updated_at thì phải thêm withTimestamps() ở phương thức trung gian tags())
                    $product->tags()->attach($tagIds);
                }
            // commit để lưu các thay đổi
            DB::commit();
            return redirect()->route('admin.product.create-form')->with('msg','Thêm sản phẩm thành công!');
        }
        catch(Exception $exception) {
            // DB::rollBack() -> dữ liệu được khôi phục về trạng thái trước khi thực hiện transaction
            DB::rollBack();
            Log::error( 'Message: ' . $exception->getMessage() . '--- line ' . $exception->getLine() );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $tags = Tags::where('product_id',$id);
        $categories = Categories::all();
        $categoryTree = $this->categoryTree($categories,0);
        $product = Products::find($id);
        return view('admin.products.product.edit-form',[
            'categories' => $categories,
            'categoryTree' => $categoryTree,
            'tags' => $tags,
            'product' => $product
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $productOld = Products::find($id);
        $productIamges = ProductImages::where('product_id',$id);
        // dd($productOld);
        try{
            // DB::beginTransaction() -> Bắt đầu thực hiện transaction (xử lý có tuần tự các thao tác trên cơ sở dữ liệu)
            DB::beginTransaction();
                if($request->hasFile('feature_image')) {
                    $file = $request->file('feature_image');
                    $fileNameOriginal = $file->getClientOriginalName();
                    $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
                    $filePath = $file->storeAs('public/product/'.Auth::user()->id,$fileNameHash);
                    $dataFeatureImages = [
                        'file_name' => $fileNameHash,
                        'file_path' =>  Storage::url($filePath)
                    ];
                }
                else{
                    $dataFeatureImages = [
                        'file_path' => $productOld->feature_image,

                    ];
                }
                $dataUpdate = [
                    'name' => $request->name,
                    'price' => $request->price,
                    'promotional_price' => $request->promotional_price,
                    'quantity' => $request->quantity,
                    'feature_image' => $dataFeatureImages['file_path'],
                    'description' => $request->description,
                    'category_id' => $request->category_id,
                    'slug' => $request->slug ?? ($request->slug ? str::slug($request->slug) : str::slug($request->name)),
                ];

                $product = Products::where('id',$id)->update($dataUpdate);

                if($request->hasFile('images')) {
                    if( is_array($request->images) && !empty($request->images)) {
                        $productIamges ->delete();
    
                        foreach($request->images as $imageItem) {
                            $fileNameOriginal = $imageItem->getClientOriginalName();
                            $fileNameHash = str::random(20) . '.' . $imageItem->getClientOriginalExtension();
                            $filePath = $imageItem->storeAs('public/product/'.Auth::user()->id,$fileNameHash);
                            $dataDetailImages = [
                                'file_name' => $fileNameHash,
                                'file_path' => Storage::url($filePath),
                            ];
                            $productOld->images()->create([
                                'image' => $dataDetailImages['file_name'],
                            ]);
                            // $productIamge = ProductImages::create([
                            //     'product_id' => $product->id,
                            //     'image' => $dataDetailImages['file_name'],
                            // ]);
                        }
                    }
                }
                if(!empty($request->tags)) {
                    foreach($request->tags as $tagItem) {
                        // Nếu $tagItem đã có trong database thì hợp nhất với bản ghi đó, nếu ko có thì tạo mới
                        $tag = Tags::updateOrCreate(
                            ['name'=>$tagItem]
                        );
                        $tagIds[] = $tag->id; // Lưu id vào 1 mảng để thêm vào table tag
                    }
                    // attach: Gắn tag_id vào table tags (để gắn cả created_at và updated_at thì phải thêm withTimestamps() ở phương thức trung gian tags())
                    // sync: Bất kỳ tag_id nào không nằm trong mảng $tagIds sẽ bị xóa khỏi bảng trung gian, (Thêm các tag_id có trong $tagIds, Nếu đã có rồi thì giữ nguyên, chưa có thì thêm mới, những cái cũ ko thuộc mảng $tagIds thì bị xóa đi)
                }else{
                    $tagIds = [];
                }
                $productOld->tags()->sync($tagIds);
                
                // commit để lưu các thay đổi
                DB::commit();
                return redirect()->back()->with('msg','Cập nhật sản phẩm thành công!');
        }catch(Exception $exception) {
            // DB::rollBack() -> dữ liệu được khôi phục về trạng thái trước khi thực hiện transaction
            DB::rollBack();
            Log::error( 'Message: ' . $exception->getMessage() . '--- line ' . $exception->getLine() );
        }
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            Products::find($id)->update([
                'status' => 0,
            ]);
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ],200);
        } catch (Exception $exception) {
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ],500);
        }
    }

    public function deleteProducts(Request $request) {
        try {
            $ids = $request->ids;
            // if(!empty($ids)) {
                Products::whereIn('id', $ids)->update([
                    'status' => 0
                ]);
                return redirect()->back()->with('msg','Xóa thành công');

                // return response()->json([
                //     'code' => 200,
                //     'message' => 'success',
                // ],200);
            // }
        // return redirect()->back();

        } catch (Exception $exception) {
            Log::error( 'Message: ' . $exception->getMessage() . '--- line ' . $exception->getLine() );
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ],500);
        }

        // return redirect()->back();
    }

    // Đệ quy category
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

