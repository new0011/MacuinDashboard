<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TickUser extends Model
{
    use HasFactory;
    protected $table="TicketUser";
    protected $primaryKey="IDUT";

    protected $fillable = [
        'IDUT',
        'IDU',
        'IDTick',
    ];

    public function getAllTU(){
        return TickUser::all();
    }
}
