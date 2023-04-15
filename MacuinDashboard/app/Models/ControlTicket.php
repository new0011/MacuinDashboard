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
        'IDAux',
        'Registrado',
        'Editado'
    ];

    public function getAllControlT(){
        return ControlTicket::all();
    }
    public function getAllControlOrder($sort, $sentido){
        return ControlTicket::orderBy($sort, $sentido)->get();
    }
    public function getTicketCli($id){
        return ControlTicket::all()->where('email', '=', $id);
    }
    public function getTicketAux($id){
        return ControlTicket::all()->where('IDAux', '=', $id);
    }
    public function getTicketAuxOrder($id, $sort, $sentido){
        return ControlTicket::where('IDAux', '=', $id)->orderBy($sort, $sentido)->get();
    }
}
