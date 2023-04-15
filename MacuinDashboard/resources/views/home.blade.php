@extends('plantilla')
@section('content')
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
    <symbol id="prov" viewBox="0 0 16 16">
        <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5ZM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5h-13Z"/>
    </symbol>
</svg>
@if((session()->has('conflog')))
<script>
     notie.alert({
        type: 1, 
        text: 'Bienvenido de vuelta :D',
    })
</script>
@endif

@if($errors->any())
<script>
    notie.alert({
       type: 3, 
       text: 'Error al borrar :(',
   })
</script>
@endif
<div class='container-fluid'>
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
</div>

    <div class="container text-center">
        <h1>MacQueen Dashboard</h1>
        <h3>Solucion y Soporte eficiente para todos</h3>
        <h4>Bienvenido {{auth()->user()->nameU}} empieza a administrar tus Tickets</h4>
        <div class="text-center m-2 mb-4">
            <svg class="bi" width="100" height="100"><use xlink:href="#prov"/></svg>
        </div>
    </div>
@stop
