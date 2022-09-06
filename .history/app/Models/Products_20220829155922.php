<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\ProductImages;

class Products extends Model
{
    use HasFactory;

    // Khai báo từng field name có thể insert
    // protected $fillable = ['name','price','quantity'];

    // Khai báo không được phép insert
    protected $guarded = [];
    // protected $table = 'products';
    
    public function category() {
        // nhiều sản phẩm thuộc 1 danh mục (quan hệ 1 nhiều) 
        return $this->belongsTo(Categories::class,'category_id');
        // belongsTo ngược với hasMany
    }

    public function images() {
        // return $this->hasMany(ProductImages::class);
        // 1 sản phẩm có nhiều ảnh (quan hệ 1 nhiều)
        return $this->hasMany(ProductImages::class,'product_id');
    }
    public function attributes() {
        return $this->belongsToMany(Attributes::class, 'product_attributes','product_id','attribute_id')->withTimestamps();
    }
    
    public function tags() {
        // Quan hệ nhiều nhiều
        // return $this->belongsToMany(Tags::class, 'bang_trung_gian', 'khoa_ngoai_cua_model_nay', 'khoa_ngoai')->withTimestamps();
        return $this->belongsToMany(Tags::class, 'product_tags','product_id','tag_id')->withTimestamps()->withPivot('tag_id');
    }

    public function loadList($params = [],$categoryId = null) {
        $query = $this->where('status',1)->orderBy('id','desc');
        if(!empty($params)) {
            $query = $query->where($params);
        }
        if(!empty($categotyId)) {
            $query= $query->whereRaw('MATCH(category_track) AGAINST(? IN BOOLEAN MODE) ',[$categoryId]);
        }
        $list = $query->get();
        return $list;
    }

    public function loadListPaginate($params = [],$categoryId = null,$lim = '') {
        $query = $this->where('status',1)->orderBy('id','desc');
        if(!empty($params)) {
            $query = $query->where($params);
        }
        if(!empty($categoryId)) {
            $query= $query->whereRaw('MATCH(category_track) AGAINST(? IN BOOLEAN MODE) ',[$categoryId]);
        }
        $list = $query->paginate($lim);
        return $list;
    }

    public function saveNew($params) {
        $query = $this->create($params);
        return $query;
    }
    
    public function loadOne($id) {
        $query = $this->find($id);
        return $query;
    }

    public function saveUpdate($id, $params) {
        $query = $this->where('id', $id)->update($params);
        return $query;
    }

    public function remove($id, $params) {
        $query = $this->where('id', $id)->update($params);
    }

    public function removeMany($ids,$params) {
        $query = $this->whereIn('id',$ids)->update($params);
    }
}
