<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    public $fillable = ['name','slug','parent_id'];
   
    public function categoryChild() {
        return $this->hasMany(Categories::class,'parent_id');
    }

    public function loadList($params = []) {
        $query = $this->where('status',1);
        if(!empty($params)) {
            $query = $query->where($params);
        }
        $list = $query->get();
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
    public function loadListDiff($id) {
        $query = $this->where('id', '<>',$id);
        $list = $query->get();
        return $list;
    }

    public function saveUpdate($id, $params) {
        $query = $this->where('id', $id)->update($params);
        return $query;
    }

    public function updateCateChild($id,$params) {
        $query = $this->where('parent_id', $id);
        $cate = $query->update($params);
    }

    public function remove($id, $params) {
        $query = $this->where('id', $id)->update($params);
    }

    public function removeMany($ids,$params) {
        $query = $this->whereIn('id',$ids)->update($params);
    }
}
