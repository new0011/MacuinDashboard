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
          <li class="breadcrumb-item" aria-current="page"><a href='{{route('consTicketAux.index', $id)}}'>Control de Tickets</a></li>
          <li class="breadcrumb-item active" aria-current="page">Cambio de Status</li>          
        </ol>
    </nav>
</div>

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
        <symbol id="prov" viewBox="0 0 16 16">
                <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
        </symbol>
    </svg>

    <div class="container formxd">
        <div class="text-center mt-2">
            <h2 class="fw-normal">Cambio de Estatus</h2>
        </div>
        <div class="text-center m-2 mb-4">
            <svg class="bi" width="100" height="100"><use xlink:href="#prov"/></svg>
        </div>

        <form method="post" action="{{route('changeStatus.update', $id)}}">
            @csrf
            {!!method_field('PUT')!!}
            <div class="row g-3 align-items-center">
                    <div class="form-group">
                        <label class="form-label">Estatus Disponibles: </label>
                        <select required name="IDStat" class="form-select" aria-label=".form-select-lg example">
                            <option disabled selected>Selecciona una opción</option>
                            <option value="1">Completado</option>
                            <option value="4">Nunca Completado</option>
                            <option value="3">En Proceso</option>
                        </select>
                        <p class="fv-bold text-danger">{{$errors->first('IDStat')}}</p>
                    </div>
                <div class="text-center">
                    <button type="submit" name="btnsaveU" class="btn btn-dark m-3">Mandar</button>
                </div>
            </div>
            <script>

            </script>  

        </form>
    </div>
@stop