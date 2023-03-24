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
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-bookmark" viewBox="0 0 16 16">
        <symbol id="prov" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
        </symbol>
    </svg>

    <div class="container formxd">
        <div class="text-center mt-2">
            <h2 class="fw-normal">Agregar Reporte</h2>
        </div>
        <div class="text-center m-2 mb-4">
            <svg class="bi" width="100" height="100"><use xlink:href="#prov"/></svg>
        </div>

        <form method="post" action="">
            @csrf
            <div class="row g-3 align-items-center">
                <div class="form-group">
                    <label class="form-label" name="TypeU">Tipo de usuario: </label>
                    <select name="TypeU" class="form-select" aria-label=".form-select-lg example">
                        <option disabled selected>Selecciona una opción</option>
                        <option value="0">Usuario Normal</option>
                        <option value="1">Administrador</option>
                    </select>
                    <p class="fv-bold text-danger">{{$errors->first('TypeU')}}</p>
                </div>
                <div class="form-group">
                    <label class="form-label" name="TypeU">Tipo de reporte: </label>
                    <select name="TypeU" class="form-select" aria-label=".form-select-lg example">
                        <option disabled selected>Selecciona una opción</option>
                        <option value="0">Queja</option>
                        <option value="1">Sugerencia</option>
                    </select>
                    <p class="fv-bold text-danger">{{$errors->first('TypeU')}}</p>
                </div>
                <div class="mb-3">
                    <label for="reporte" class="form-label">Observaciones: </label>
                    <textarea class="form-control" id="reporte" rows="3"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" name="btnsaveU" class="btn btn-dark m-3">Enviar</button>
                </div>
            </div>
            <script>

            </script>  

        </form>
    </div>
@stop