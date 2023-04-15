<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\ControlTicket;
use App\Models\asigAux;
use App\Http\Requests\TicketReq;
Use PDF;


class printReports extends Controller
{
    protected $tick;
    protected $controlT;
    protected $aU;
    public function __construct(Ticket $tick, ControlTicket $controlT, asigAux $aU){
        $this->tick=$tick;
        $this->controlT=$controlT;
        $this->aU=$aU;
    }

    public function index()
    {
        $cT = $this->controlT->getAllControlT();
        return view('printTicket', compact('cT'));
    }

    public function indexA(){
        $cT = $this->controlT->getTicketAux(auth()->user()->IDU);
        return view('printTicketA', compact('cT'));
    }

    public function createContJ(){
        return view('reportJefe');
    }

    public function createContA(){
        return view('reportAux');
    }

    public function printContJ(Request $req){
        $cT = $this->controlT->getAllControlOrder($req->columnOrder, $req->sentido);
        $pdf = PDF::setOptions(['defaultFont' => 'dejavu serif'])->loadView('printTicket', compact('cT'));
        return $pdf->stream('informe.pdf');
    }

    public function printContA(Request $req){
        $cT = $this->controlT->getTicketAuxOrder(auth()->user()->IDU, $req->columnOrder, $req->sentido);
        $pdf = PDF::setOptions(['defaultFont' => 'dejavu serif'])->loadView('printTicketA', compact('cT'));
        return $pdf->stream('informeAux.pdf');
    }
}
