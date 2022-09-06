<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Tags;
use App\Models\ProductTags;
use App\Models\Sliders;
use App\Models\Attributes;
use App\Models\ProductImages;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $categories;
    protected $products;
    // protected $attributes;
    // protected $productImages;
    protected $sliders;
    protected $v;
    public function __construct(Categories $categories, Products $products,Attributes $attributes, ProductImages $productImages, Tags $tags, Sliders $sliders)
    {
        $this->categories = $categories;
        $this->products = $products;
        $this->sliders = $sliders;
        $this->v = [];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $categories = $this->categories->where('status',1)->get();
        $cates = $this->categories->all();
        $categories = $this->categoryTree($cates);
        $products = $this->products->where('status',1)->limit(8)->orderBy('created_at','DESC')->get();
        $sliders = $this->sliders->where('status',1)->get();
        $this->v['products'] = $products;
        $this->v['categories'] = $categories;
        $this->v['sliders'] = $sliders;
        return view('client.index',$this->v);
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
