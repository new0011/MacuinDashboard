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
@if((session()->has('confTick')))
<script>
     notie.alert({
        type: 1, 
        text: 'Enviada Solicitud :D',
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
          <li class="breadcrumb-item active" aria-current="page">Nuevo Ticket</li>          
        </ol>
    </nav>
</div>

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
        <symbol id="prov" viewBox="0 0 16 16">
            <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5ZM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5h-13Z"/>
        </symbol>
    </svg>

    <div class="container formxd">
        <div class="text-center mt-2">
            <h2 class="fw-normal">Registrar Nuevo Problema</h2>
        </div>
        <div class="text-center m-2 mb-4">
            <svg class="bi" width="100" height="100"><use xlink:href="#prov"/></svg>
        </div>

        <form method="post" action="{{route('newTicket.saveT')}}">
            @csrf
            <div class="row g-3 align-items-center">
                    <div class="form-group">
                        <label class="form-label">Problema: </label>
                        <input required type="text" class="form-control" name="Problema" placeholder="Explica brevemente tu problema..." value="{{old("Problema")}}">
                        <p class="fv-bold text-danger">{{$errors->first('Problema')}}</p>
                    </div>
                    <input type="hidden" name="IDSta" value="6">
                    <input type="hidden" name="IDCli" value="{{auth()->user()->IDU}}">
                    <input type="hidden" name="IDAux" value="1">                        
                <div class="text-center">
                    <button type="submit" name="btnsaveU" class="btn btn-dark m-3">Mandar</button>
                </div>
            </div>
            <script>

            </script>  

        </form>
    </div>
@stop