<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $guarded = [];
    public function rolePermissions() {
        return $this->belongsToMany(Permissions::class,'permission_role','permission_id','role_id');
    }

    public function loadList($params = []) {
        $query = $this->all();
        return $query;
    }
}
