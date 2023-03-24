<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamentos;

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
    public function store(Request $req)
    {
        $deptm = new Departamentos($req->all());
        $deptm->save();
        return redirect(route('registerD'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
