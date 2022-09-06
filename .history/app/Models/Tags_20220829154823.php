<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    public $fillable = ['name'];

    public function loadList($params = []) {
        $list = $this->get();
        return $list;
    }

    public function saveNew($params) {
        $query = $this->create($params);
        return $query;
    }
    
    public function loadPrdTags($id) {
        $query = $this->where('product_id',$id);
        $list = $query->get();
        return $list;
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
