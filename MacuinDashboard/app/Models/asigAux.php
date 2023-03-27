<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asigAux extends Model
{
    use HasFactory;
    protected $table = 'asigAux';
    protected $fillable = [
        'IDU',
        'email',
        'NombreCompleto',
        'NameDep'
    ];

    public function getAllAUX(){
        return asigAux::all();
    }
}
