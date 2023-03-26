@extends('plantilla')
@section('content')
<style>
    div.formxd{
        border-color: black;
        border-style: solid;
        border-radius: 5px;
        margin-top: 10px;
        position: relative;
        width: 30%;
        background-color: white;
    }
</style>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
        <symbol id="prov" viewBox="0 0 16 16">
            <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
            <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
        </symbol>
    </svg>

    <div class="container formxd">
        <div class="text-center mt-2">
            <h2 class="fw-normal">Editar Departamento</h2>
        </div>
        <div class="text-center m-2 mb-4">
            <svg class="bi" width="100" height="100"><use xlink:href="#prov"/></svg>
        </div>

        <form method="post" action="{{route('consDepart.update', $dept->IDEP)}}">
            @csrf
            {!!method_field('PUT')!!}
            <div class="row g-3 align-items-center">
                    <div class="form-group">
                        <label class="form-label">Nombre del departamento: </label>
                        <input required type="text" class="form-control" name="NameDep" placeholder="Introduce el nombre del departamento..." value="{{$dept->NameDep}}">
                        <!--<p class="fv-bold text-danger">{$errors->first('Nombre_Usuario')}}</p>-->
                    </div>
                    <div class="form-group">
                        <label class="form-label">Descripción: </label>
                        <textarea required class="form-control" name="Descripcion" rows="3" placeholder="Desatate">{{$dept->Descripcion}}</textarea>
                        <!--<p class="fv-bold text-danger">{$errors->first('Correo')}}</p>-->
                    </div>
                <div class="text-center">
                    <button type="submit" name="btnsaveD" class="btn btn-dark m-3">Guardar</button>
                </div>
            </div>
        </form>
    </div>
@stop