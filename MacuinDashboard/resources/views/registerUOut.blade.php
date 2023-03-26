@extends('plantillaLog')
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
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
        <symbol id="prov" viewBox="0 0 16 16">
                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
        </symbol>
    </svg>

    <div class="container formxd">
        <div class="text-center mt-2">
            <h2 class="fw-normal">Registrate</h2>
        </div>
        <div class="text-center m-2 mb-4">
            <svg class="bi" width="100" height="100"><use xlink:href="#prov"/></svg>
        </div>

        <form method="post" action="{{route('registerUOut.registeredO')}}">
            @csrf
            <div class="row g-3 align-items-center">
                    <div class="form-group">
                        <label class="form-label">Nombre: </label>
                        <input required type="text" class="form-control" name="nameU" placeholder="Introduce tu nombre de usuario..." value="{{old("nameU")}}">
                        <!--<p class="fv-bold text-danger">{$errors->first('Nombre_Usuario')}}</p>-->
                    </div>
                    <div class="form-group">
                        <label class="form-label">Apellido paterno: </label>
                        <input required type="text" class="form-control" name="LastNameP" placeholder="Apellido Paterno..." value="{{old("LastNameP")}}">
                        <!--<p class="fv-bold text-danger">{$errors->first('Correo')}}</p>-->
                    </div>
                    <div class="form-group">
                        <label class="form-label">Apellido materno: </label>
                        <input required type="text" class="form-control" name="LastNameM" placeholder="Apellido Materno..." value="{{old("LastNameM")}}">
                        <!--<p class="fv-bold text-danger">{$errors->first('Correo')}}</p>-->
                    </div>
                    <div class="form-group">
                        <label class="form-label">Correo Electronico: </label>
                        <input required type="email" class="form-control" name="email" placeholder="Introduce tu correo personal..." value="{{old("email")}}">
                        <!--<p class="fv-bold text-danger">{$errors->first('Correo')}}</p>-->
                    </div>
                    <div class="form-group">
                        <label class="form-label">Contraseña: </label>
                        <input required type="password" class="form-control" name="password" placeholder="Introduce una contraseña segura..." value="{{old("password")}}">
                        <!--<p class="fv-bold text-danger">{$errors->first('Correo')}}</p>-->
                    </div>
                    <div class="form-group">
                        <label class="form-label" name="TypeU">Departamento: </label>
                        <select name="IDEP" class="form-select" aria-label=".form-select-lg example">
                            <option disabled selected>Selecciona una opción</option>
                            @foreach($dep as $dep)
                                <option value="{{$dep->IDEP}}">{{$dep->NameDep}}</option>
                            @endforeach
                        </select>
                        <!--<p class="fv-bold text-danger">{$errors->first('TypeU')}}</p>-->
                    </div>
                    <input type="hidden" name="IDRole" value="3">
                    <input type="hidden" name="verify" value="2">
                <div class="text-center">
                    <button type="submit" name="btnsaveU" class="btn btn-dark m-3">Guardar</button>
                    <a href=""></a>
                </div>
            </div>
        </form>
    </div>
@stop