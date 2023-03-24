<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsUser extends Model
{
    use HasFactory;
    protected $table = "DatosUsuario";
    protected $fillable = [
        'IDU',
        'Nombre Completo',
        'nameRole',
        'nameDep'
    ];
    public function getAllDatosU(){
        return ConsUser::all();
    }
}
