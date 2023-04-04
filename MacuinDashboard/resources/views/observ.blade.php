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
@if((session()->has('confComm')))
<script>
     notie.alert({
        type: 1, 
        text: 'Enviado Comentario :D',
    })
</script>
@endif

@if($errors->any())
<script>
    notie.alert({
       type: 3, 
       text: 'Favor de mandar un mensaje >:(',
   })
</script>
@endif
<div class='container-fluid'>
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item" aria-current="page"><a href='{{route('home')}}'>Home</a></li>
          <li class="breadcrumb-item" aria-current="page"><a href='{{route('control')}}'>Control de Tickets</a></li>
          <li class="breadcrumb-item active" aria-current="page">Observaciones para Auxiliar</li>          
        </ol>
    </nav>
</div>

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
        <symbol id="prov" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </symbol>
    </svg>

    <div class="container formxd">
        <div class="text-center mt-2">
            <h2 class="fw-normal">Mandar Observacion</h2>
        </div>
        <div class="text-center m-2 mb-4">
            <svg class="bi" width="100" height="100"><use xlink:href="#prov"/></svg>
        </div>

        <form method="post" action="{{route('observ.updateO', $id)}}">
            @csrf
            {!!method_field('PUT')!!}
            <div class="row g-3 align-items-center">
                    <div class="form-group">
                        <label class="form-label">Observacion: </label>
                        <input required type="text" class="form-control" name="Observaciones" placeholder="Escribe una observacion para el Auxiliar..." value="{{old("Observaciones")}}">
                        <p class="fv-bold text-danger">{{$errors->first('Observaciones')}}</p>
                    </div>
                <div class="text-center">
                    <button type="submit" name="btnsaveU" class="btn btn-dark m-3">Mandar</button>
                </div>
            </div>
        </form>
    </div>
@stop