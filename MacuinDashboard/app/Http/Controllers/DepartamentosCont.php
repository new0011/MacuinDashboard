<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamentos;
use App\Http\Requests\DepartReq;

class DepartamentosCont extends Controller
{
    protected $deptm;
    public function __construct(Departamentos $deptm){
        $this->deptm=$deptm;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dept = $this->deptm->getAllDepart();
        return view('consDepart', compact('dept'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('registerD');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartReq $req)
    {
        $deptm = new Departamentos($req->all());
        $deptm->save();
        return redirect(route('registerD'))->with('confDep', 'Guardado Correctamente');
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
        $dept=$this->deptm->getIdDepart($id);
        return view('editDep', compact('dept'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $dept=Departamentos::find($id);
        $dept->fill($req->all());
        $dept->save();
        return redirect(route('consDepart'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
