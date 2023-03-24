<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = "Role";
    protected $primaryKey = "IDRole";

    protected $fillable =[
        'IDRole',
        'nameRole'
    ];

    public function getAllRole(){
        return Role::all();
    }

    public function getIdRole($id){
        return Role::find($id);
    }
}
