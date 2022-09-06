<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attributes extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name','value'];
    
    public function loadList($col=null,$val=null,$params = []) {
        $query = $this->where('deleted_at',null);
        if(!empty($col) && !empty($val)) {
            $query = $query->where($col,$val);
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

    public function saveUpdate($id, $params) {
        $query = $this->where('id', $id)->update($params);
        return $query;
    }

    public function remove($id) {
        $query = $this->where('id', $id)->delete();
    }

    public function removeMany($ids,$params) {
        $query = $this->whereIn('id',$ids)->update($params);
    }
}
