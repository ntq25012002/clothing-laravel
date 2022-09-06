<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    // public function product()
    // {
    //     return $this->belongsTo(Products::class);
    // }
    public function loadList($params = []) {
        $list = $this->get();
        return $list;
    }
    public function loadPrdImgs($id) {
        $query = $this->where('product_id',$id);
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

    public function saveUpdate($id, $params) {
        $query = $this->where('id', $id)->update($params);
        return $query;
    }

    public function remove($id, $params) {
        $query = $this->where('product_id', $id)->delete();
    }

    public function removeMany($ids,$params) {
        $query = $this->whereIn('id',$ids)->update($params);
    }
}
