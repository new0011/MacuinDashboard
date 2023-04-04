<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table='Ticket';
    protected $primaryKey='IDTick';
    protected $fillable = [
        'Problema',
        'Comentarios',
        'Observaciones',
        'IDSta',
        'IDCli',
        'IDAux',
    ];
    public function getAllTickets(){
        return Ticket::all();
    }
}
