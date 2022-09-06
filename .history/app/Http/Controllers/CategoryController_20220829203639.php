<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    protected $categories;
    public function __construct(Categories $categories) {
        $this->categories = $categories;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $filters = [];
        if(!empty($request->search_key)) {
            $filters[] = ['name','LIKE','%'.$request->search_key.'%'];
        }
        $categories = $this->categories->loadList($filters)->toArray();
        $categoriesTree = $this->categoryTree($categories, 0);
        return view('admin.products.category.index', [
            'categories' => $categories,
            'categoriesTree' => $categoriesTree,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categories->loadList();
        $categoriesTree = $this->categoryTree($categories, 0);

        return view('admin.products.category.create-form', [
            'categories' => $categories,
            'categoriesTree' => $categoriesTree
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'name' => 'required'
        ];
        $messages = [
            'name.required' => 'Vui lòng nhập tên danh mục'
        ];
        $request->validate($rules,$messages);
        $data = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => $request->slug ?? str::slug($request->name),
        ];
        $category = $this->categories->saveNew($data);
        if($category) {
            return redirect()->route('admin.category.create-form')->with('msg','Thêm danh mục thành công');
        }else{
            return redirect()->route('admin.category.create-form')->with('err','Lỗi thêm danh mục');
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
        $categories = $this->categories->loadListDiff($id);
        $categoriesTree = $this->categoryTree($categories, 0);
        $category = $this->categories->loadOne($id);
        $parentId = $category->parent_id;

        return view('admin.products.category.edit-form', [
            'category' => $category,
            'categoriesTree' => $categoriesTree,
            'categories' => $categories, 
            'parentId' => $parentId
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
        $rules = [
            'name' => 'required'
        ];
        $messages = [
            'name.required' => 'Vui lòng nhập tên danh mục'
        ];
        $request->validate($rules,$messages);
        $data = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => $request->slug ? str::slug($request->slug) : str::slug($request->name)
        ];
        $cateNew = $this->categories->saveUpdate($id,$data);
        if($cateNew) {
            return redirect()->route('admin.category.edit-form',['id' => $id])->with('msg','Cập nhật danh mục thành công');
        }else{
            return redirect()->route('admin.category.edit-form',['id' => $id])->with('err','Lỗi cập nhật');
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
        $cate = $this->categories->loadOne($id);
        $categories = $this->categories->loadList();
        foreach ($categories as $category) {
            if($category['parent_id'] == $id) {
                $this->categories->updateCateChild($id,[
                    'parent_id' => $cate['parent_id'],
                ]);
            }
        }
        $data = [
            'status' => 0
        ];
        $this->categories->remove($id,$data);
        return redirect()->back();
    }

    public function deleteCategories(Request $request)
    {
        $ids = $request->ids;
        $data = [
            'status' => 0
        ];
        $this->categories->removeMany($ids,$data);
        return redirect()->back();
    }

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
