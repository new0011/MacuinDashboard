<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\ControlTicket;
use App\Models\asigAux;
use App\Http\Requests\TicketReq;

class TicketControl extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        return view('controlTickets', compact('cT'));
    }

    public function index1($id){
        $Aux = $this->aU->getAllAUX();
        return view('asigAuxiliar', compact('Aux', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('newTicket');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketReq $req)
    {
        $ti = new Ticket();
        $ti->Problema=$req->Problema;
        $ti->Comentarios=$req->Comentarios;
        $ti->IDSta=$req->IDSta;
        $ti->IDCli=$req->IDCli;
        $ti->IDAux=2;
        $ti->save();
        return redirect(route('newTicket'))->with('confTick', 'Enviado Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $auxAsig = Ticket::find($id);
        $auxAsig->IDAux = $req->IDAux;
        $auxAsig->save();
        return redirect(route('control'))->with('confTC', 'Asignado Auxiliar Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
