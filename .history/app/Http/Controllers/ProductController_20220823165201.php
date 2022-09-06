<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Tags;
use App\Models\ProductTags;
use App\Models\Attributes;
use App\Models\ProductAttributes;
use App\Http\Requests\ProductRequest;
use App\Models\ProductImages;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
// use DB;
class ProductController extends Controller
{
    protected $products;
    protected $attrs;
    protected $categories;
    public function __construct(Products $products, Attributes $attrs, Categories $categories) {
        $this->products = $products;
        $this->categories = $categories;
        $this->attrs = $attrs;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category_id = null){
        $tags = Tags::all();
        if(!empty($category_id)) {
            $products = $this->products->whereRaw('MATCH(category_track) AGAINST(?)',[$category_id])
                                        ->paginate(8);
            // dd($products);
        }else{
            $products = $this->products->where('status',1)
            ->orderBy('id')
            ->paginate(8);
        }
        
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
        $categories = $this->categories->all();
        $categoryTree = $this->categoryTree($categories,0);
        $colorAttrs = $this->attrs->where('deleted_at',null)->where('name','color')->get();
        $sizeAttrs = $this->attrs->where('deleted_at',null)->where('name','size')->get();
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
                $categories = $this->categories->get()->toArray();
                $dataCateTrack = $this->categoryTrack($categories,$request->category_id);
                $categoryTrack = implode(' ',$dataCateTrack);
                // dd($categoryTrack);
                if($request->hasFile('feature_image')){
                    $file = $request->file('feature_image');
                    $fileNameOriginal = $file->getClientOriginalName();
                    $fileNameHash =str::random(20) . '.' .$file->getClientOriginalExtension();
                    $filePath = $file->storeAs('public/product/',$fileNameHash);
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
                    'category_track' => $categoryTrack,
                    'slug' => $request->slug ? str::slug($request->slug) : str::slug($request->name),
                ];
                $product = $this->products->create($data);
                // dd($product);
                if($request->hasFile('images')) {
                    if( is_array($request->images) && !empty($request->images)) {
                        foreach($request->images as $imageItem) {
                            $fileNameOriginal = $imageItem->getClientOriginalName();
                            $fileNameHash = str::random(20) . '.' . $imageItem->getClientOriginalExtension();
                            $filePath = $imageItem->storeAs('public/product/',$fileNameHash);
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
        $categories = $this->categories->all();
        $colorAttrs = $this->attrs->where('deleted_at',null)->where('name','color')->get();
        $sizeAttrs = $this->attrs->where('deleted_at',null)->where('name','size')->get();
        $categoryTree = $this->categoryTree($categories,0);
        $product = $this->products->find($id);
        $prdImgOlds = ProductImages::where('product_id',$id)->get();
        $images = [];
        if(!empty($prdImgOlds)) {
            foreach($prdImgOlds as $item) {
                $images[] = $item->image;
            }
        }
        // dd($images);
        $imgOlds = json_encode($images);
        // dd($imgOlds);
        return view('admin.products.product.edit-form',[
            'categories' => $categories,
            'categoryTree' => $categoryTree,
            'tags' => $tags,
            'product' => $product,
            'colorAttrs' => $colorAttrs,
            'sizeAttrs' => $sizeAttrs,
            'prdImgOlds' => $imgOlds,
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
        // dd($request->all());
        $productOld = $this->products->find($id);
        // $prdImgOlds = ProductImages::where('product_id',$id)->get();
        try{
            // DB::beginTransaction() -> Bắt đầu thực hiện transaction (xử lý có tuần tự các thao tác trên cơ sở dữ liệu)
            DB::beginTransaction();
                $categories = $this->categories->get()->toArray();
                $dataCateTrack = $this->categoryTrack($categories,$request->category_id);
                $categoryTrack = implode(' ',$dataCateTrack);
                if($request->hasFile('feature_image')) {
                    $file = $request->file('feature_image');
                    $fileNameOriginal = $file->getClientOriginalName();
                    $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
                    $filePath = $file->storeAs('public/product/',$fileNameHash);
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
                    'category_track' => $categoryTrack,
                    'slug' => $request->slug ?? ($request->slug ? str::slug($request->slug) : str::slug($request->name)),
                ];

                $product = $this->products->where('id',$id)->update($dataUpdate);

                if($request->imageOlds && !empty($request->imageOlds)) {
                    // $dataProductOlds = ProductImages::whereIn('image',$productIamges)->get();
                    $prdImgOlds = ProductImages::where('product_id',$id)->delete();

                    $productIamges = json_decode($request->imageOlds);
                    foreach($productIamges as $item) {
                        $dataImageOld = ['image' => $item];
                        $productOld->images()->create($dataImageOld);
                    }
                }

                if($request->hasFile('images')) {
                    if( is_array($request->images) && !empty($request->images)) {
                        foreach($request->images as $imageItem) {
                            $fileNameOriginal = $imageItem->getClientOriginalName();
                            $fileNameHash = str::random(20) . '.' . $imageItem->getClientOriginalExtension();
                            $filePath = $imageItem->storeAs('public/product/',$fileNameHash);
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
                if($request->attrs && !empty($request->attrs)) {
                    $attrs = $request->attrs;
                }else{
                    $attrs = [];
                }
                $productOld->attributes()->sync($attrs);

                if($request->tags && !empty($request->tags)) {
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
            $this->products->find($id)->update([
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
                $this->products->whereIn('id', $ids)->update([
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
    
    // Đệ quy danh category track
    public function categoryTrack($data, $id) {
        $result = [];
        foreach ($data as $item) {
            if($item['id'] == $id) {
                $result[] = $item['id'];
                unset($data[$item['id']]);
                $child = $this->categoryTrack($data, $item['parent_id']);
                $result = array_merge($result, $child);
            }
        }
        return $result;
    }

    public function productList(Request $request,$slug=null) {
        $filters = [];
        if(!empty($request->product)) {
            $keyword = $request->product;
            $filters[] = ['name','LIKE','%'.$keyword.'%'];
        }
        
       
        $categories = $this->categories->where('status',1)->get();
        $categoryTree = $this->categoryTree($categories,0);
        $colorAttrs = $this->attrs->where('deleted_at',null)->where('name','color')->get();
        $sizeAttrs = $this->attrs->where('deleted_at',null)->where('name','size')->get();
        $products = $this->products->where('status',1)->limit(8);
        if(!empty($request->attr_colors) || !empty($request->attr_sizes)) {
            $prdAttrs = ProductAttributes::where('deleted_at',null);
            
            if(!empty($request->attr_colors)) {
                $attrColorIds = $request->attr_colors;
                $prdAttrs = $prdAttrs->whereIn('attribute_id',$attrColorIds);
            }
            if(!empty($request->attr_sizes)) {
                $attrSizeIds = $request->attr_sizes;
                $prdAttrs = $prdAttrs->orWhereIn('attribute_id',$attrSizeIds);
            }
            $prdAttrs = $prdAttrs->get();
            $ids = [];
            foreach($prdAttrs as $item) {
                if(!in_array($item->product_id,$ids)) {
                    $ids[] = $item->product_id;
                }
            }
            $products = $this->products->where('status',1)->whereIn('id',$ids);
        }
        if($slug!=null) {
            $cate = $this->categories->where('status',1)->where('slug',$slug)->first();
            $cateId = $cate->id;
            $products = $this->products->where('status',1)
                            ->whereRaw('MATCH(category_track) AGAINST(?  IN BOOLEAN MODE)',$cateId);
        }
        if(!empty($request->id)) {
            $products = $this->products->where('status',1)
                        ->whereRaw('MATCH(category_track) AGAINST(?  IN BOOLEAN MODE)',[$request->id])
                        ->get();
            return response()->json($products);
        }
        if(!empty($request->filter_price) && $request->filter_price != 'default') {
            $products = $products->orderBy('price',$request->filter_price);
        }
        $products = $products->get();
        
        $this->v['products'] = $products;
        $this->v['categories'] = $categoryTree;
        $this->v['colorAttrs'] = $colorAttrs;
        $this->v['sizeAttrs'] = $sizeAttrs;
        return view('client.product-list',$this->v);
    }

    public function productDetail($slug) {
        $product = $this->products->where('slug', $slug)->first();
        // dd($product->category);
        if($product->count() > 0) {
            $categories = $this->categories->where('status',1)->get();
            $categoryId = $product->category_id;
            $similarProducts = $this->products->where('category_id', $categoryId)->where('id','<>',$product->id)->get();
            $this->v['product'] = $product;
            $this->v['similarProducts'] = $similarProducts;
            $this->v['categories'] = $categories;
            return view('client.product-detail',$this->v);
        }else{
            Session::flash('error','Không tìm thấy trang !');
            return redirect()->route('404');
        }
    }

    public function search(Request $request) {
       
    }
    
}

