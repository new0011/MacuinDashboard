<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;
    protected $table='roles';
    protected $primaryKey = 'id';

    protected $fillable=[
        'id',
        'name',
        'guard_name'
    ];

    public function getAllRole(){
        return roles::all();
    }

    public function getIdRole($id){
        return roles::find($id);
    }
}
