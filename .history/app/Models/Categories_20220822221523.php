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
}
