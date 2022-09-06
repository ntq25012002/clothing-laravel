<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $table = 'user_role';

    public function loadList($roleId = null,$params = []) {
        $query = $this->where('role_id',$roleId);
        $list = $query->get();
        return $list;
    }
}
