<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ControlTicket extends Model
{
    use HasFactory;
    protected $table = 'TicketControl';
    protected $fillable =[
        'IDTick',
        'Problema',
        'email',
        'Comentarios',
        'Observaciones',
        'Status',
        'Cliente',
        'Auxiliar',
        'Registrado',
        'Editado'
    ];

    public function getAllControlT(){
        return ControlTicket::all();
    }
    public function getTicketCli($id){
        return ControlTicket::all()->where('email', '=', $id);
    }
}
