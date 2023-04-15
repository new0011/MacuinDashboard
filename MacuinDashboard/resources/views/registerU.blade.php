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
          <li class="breadcrumb-item active" aria-current="page">Registro de Usuario</li>
        </ol>
    </nav>
</div>
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person" viewBox="0 0 32 32">
        <symbol id="prov" viewBox="0 0 16 16">
                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
        </symbol>
    </svg>

    <div class="container formxd">
        <div class="text-center mt-2">
            <h2 class="fw-normal">Agregar Usuario</h2>
        </div>
        <div class="text-center m-2 mb-4">
            <svg class="bi" width="100" height="100"><use xlink:href="#prov"/></svg>
        </div>

        <form method="post" action="{{route('registerU.registered')}}">
            @csrf
            <div class="row g-3 align-items-center">
                    <div class="form-group">
                        <label class="form-label">Nombre: </label>
                        <input required type="text" class="form-control" name="nameU" placeholder="Introduce solo tu primer nomber o username..." value="{{old("nameU")}}">
                        <p class="fv-bold text-danger">{{$errors->first('nameU')}}</p>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Apellido paterno: </label>
                        <input required type="text" class="form-control" name="LastNameP" placeholder="Apellido Paterno..." value="{{old("LastNameP")}}">
                        <p class="fv-bold text-danger">{{$errors->first('LastNameP')}}</p>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Apellido materno: </label>
                        <input required type="text" class="form-control" name="LastNameM" placeholder="Apellido Materno..." value="{{old("LastNameM")}}">
                        <p class="fv-bold text-danger">{{$errors->first('LastNameM')}}</p>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Correo Electronico: </label>
                        <input required type="email" class="form-control" name="email" placeholder="Introduce tu correo personal..." value="{{old("email")}}">
                        <p class="fv-bold text-danger">{{$errors->first('email')}}</p>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Contraseña: </label>
                        <input required type="password" class="form-control" name="password" placeholder="Introduce una contraseña segura..." value="{{old("password")}}">
                        <p class="fv-bold text-danger">{{$errors->first('password')}}</p>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Confirmar Contraseña: </label>
                        <input required type="password" class="form-control" name="password_confirmation" placeholder="Introduce una contraseña segura..." value="{{old("password_confirmation")}}">
                        <p class="fv-bold text-danger">{{$errors->first('password_confirmation')}}</p>
                    </div>
                    <div class="form-group">
                        <label class="form-label" name="TypeU">Departamento: </label>
                        <select name="IDEP" class="form-select" aria-label=".form-select-lg example">
                            <option disabled selected>Selecciona una opción</option>
                            @foreach($dep as $dep)
                                <option value="{{$dep->IDEP}}">{{$dep->NameDep}}</option>
                            @endforeach
                        </select>
                        <p class="fv-bold text-danger">{{$errors->first('IDEP')}}</p>
                    </div>
                    <div class="form-group">
                        <label class="form-label" name="TypeU">Tipo de usuario: </label>
                        <select name="id" class="form-select" aria-label=".form-select-lg example">
                            <option disabled selected>Selecciona una opción</option>
                            @foreach($rol as $rol)
                                <option value="{{$rol->id}}">{{$rol->name}}</option>
                            @endforeach
                        </select>
                        <p class="fv-bold text-danger">{{$errors->first('id')}}</p>
                    </div>
                    <input type="hidden" name="verify" value="1">                        
                <div class="text-center">
                    <button type="submit" name="btnsaveU" class="btn btn-dark m-3">Guardar</button>
                </div>
            </div>
            <script>

            </script>  

        </form>
    </div>
@stop