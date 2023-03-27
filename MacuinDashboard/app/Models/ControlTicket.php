<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlTicket extends Model
{
    use HasFactory;
    protected $table = 'TicketControl';
    protected $fillable =[
        'IDTick',
        'Problema',
        'Comentarios',
        'Status',
        'Cliente',
        'Auxiliar',
        'Registrado',
        'Editado'
    ];

    public function getAllControlT(){
        return ControlTicket::all();
    }
}
