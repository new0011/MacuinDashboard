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
        margin-bottom: 10px;
    }
a {
  text-decoration: none;
}    

</style>
@if((session()->has('confUser')))
<script>
     notie.alert({
        type: 1, 
        text: 'Guardado Correctamente',
    })
</script>
@endif

@if($errors->any())
<script>
    notie.alert({
       type: 3, 
       text: 'Favor de checar los datos introducidos >:(',
   })
</script>
@endif
<div class='container-fluid'>
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item" aria-current="page"><a href='{{route('home')}}'>Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Generar Reportes</li>
        </ol>
    </nav>
</div>
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person" viewBox="0 0 32 32">
        <symbol id="prov" viewBox="0 0 16 16">
            <path d="M14 4.5V9h-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v7H2V2a2 2 0 0 1 2-2h5.5L14 4.5zM13 12h1v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-2h1v2a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-2zM.5 10a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H.5z"/>        
        </symbol>
    </svg>

    <div class="container formxd">
        <div class="text-center mt-2">
            <h2 class="fw-normal">Generar Reportes de Tickets</h2>
        </div>
        <div class="text-center m-2 mb-4">
            <svg class="bi" width="100" height="100"><use xlink:href="#prov"/></svg>
        </div>

        <form method="post" action="{{route('printCJ')}}">
            @csrf
            <div class="row g-3 align-items-center">
                    <div class="form-group">
                        <label class="form-label" name="column">Ordenar por: </label>
                        <select required name="columnOrder" class="form-select" aria-label=".form-select-lg example">
                            <option disabled selected>Selecciona una opción</option>
                            <option value="IDTick">ID de Ticket</option>
                            <option value="Problema">Problema</option>
                            <option value="Status">Estatus</option>
                            <option value="Cliente">Nombre de Cliente</option>
                            <option value="Auxiliar">Nombre de Auxiliar</option>
                            <option value="Registrado">Fecha de Creación</option>
                            <option value="Editado">Fecha de Actualización</option>
                        </select>
                        <p class="fv-bold text-danger">{{$errors->first('IDEP')}}</p>
                    </div>
                    <div class="form-group">
                        <label class="form-label" name="">Sentido de Ordenamiento: </label>
                        <select required name="sentido" class="form-select" aria-label=".form-select-lg example">
                            <option disabled selected>Selecciona una opción</option>
                            <option value="ASC">Ascendente</option>
                            <option value="DESC">Descendente</option>
                        </select>
                        <p class="fv-bold text-danger">{{$errors->first('id')}}</p>
                    </div>
                    <input type="hidden" name="verify" value="1">                        
                <div class="text-center">
                    <button type="submit" name="btnsaveU" class="btn btn-dark m-3">Generar PDF</button>
                </div>
            </div>
            <script>

            </script>  

        </form>
    </div>
@stop