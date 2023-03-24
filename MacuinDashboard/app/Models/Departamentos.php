<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    use HasFactory;

    protected $table = 'Departamento';
    protected $primaryKey = 'IDEP';
    protected $fillable= [
        'IDEP',
        'NameDep',
        'Descripcion'
    ];

    public function getAllDepart(){
        return Departamentos::all();
    }

    public function getIdDepart($id){
        return Departamentos::find($id);
    }
}
