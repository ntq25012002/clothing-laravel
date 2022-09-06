<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::where('status',1)->get()->toArray();
        // dd($categories);
        $categoriesTree = $this->categoryTree($categories, 0);
        // dd($categoriesTree);
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
        $categories = Categories::all();
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
        $category = Categories::create($data);
        return redirect()->route('admin.category.create-form')->with('msg','Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Categories::where('id', '<>',$id)->get();
        $categoriesTree = $this->categoryTree($categories, 0);
        $category = Categories::find($id);
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
        Categories::where('id', $id)->update($data);
        return redirect()->route('admin.category.edit-form')->with('msg','Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Categories::find($id);
        $categories = Categories::all();
        foreach ($categories as $category) {
            if($category['parent_id'] == $id) {
                Categories::where('parent_id', $id)->update([
                    'parent_id' => $cate['parent_id'],
                ]);
            }
        }
        
        Categories::where('id', $id)->update([
            'status' => 0
        ]);
        return redirect()->back();
    }

    public function deleteCategories(Request $request)
    {
        // dd($request->ids);
        $ids = $request->ids;
        Categories::whereIn('id',$ids)->update([
            'status' => 0
        ]);

        return redirect()->back();
    }


    public function categoryTree($data, $parent_id = 0, $level = 0) {
        $result = [];
        // foreach ($data as $item) {
        //     if($item->id == $parent_id) {
        //         $item['level'] = $level;
        //         $result[] = $item;
        //     }
        // }
        foreach ($data as $item) {
            if($item['parent_id'] == $parent_id) {
                $item['level'] = $level;
                $result[] = $item;
                unset($data[$item['id']]);
                $child = $this->categoryTree($data, $item['id'], $level + 1);
                $result = array_merge($result, $child);
            }
        }
        return $result;
    }
}
