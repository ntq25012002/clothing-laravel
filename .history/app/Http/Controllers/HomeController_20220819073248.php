<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Tags;
use App\Models\ProductTags;
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
    // protected $tags;
    protected $v;
    public function __construct(Categories $categories, Products $products,Attributes $attributes, ProductImages $productImages, Tags $tags)
    {
        // $this->middleware('auth');
        $this->categories = $categories;
        $this->products = $products;
        // $this->attributes = $attributes;
        // $this->productImages = $productImages;
        // $this->tags = $tags;
        $this->v = [];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = $this->categories->where('status',1)->get();
        $products = $this->products->where('status',1)->limit(8)->orderBy('created_at','DESC')->get();
        $this->v['products'] = $products;
        $this->v['categories'] = $categories;
        // $this->v['products'] = $products;
        return view('client.index',$this->v);
    }
}
