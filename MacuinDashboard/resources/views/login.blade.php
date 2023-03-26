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
    }
    input.inputB{
        border-color: black;
        border-style: solid;
        border-width: 2px;
    }
</style>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
    <symbol id="prov" viewBox="0 0 16 16">
        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
    </symbol>
</svg>

<div class="container formxd" style="background-color: #ECF2FF;">
    <div class="text-center mt-2">
        <h2 class="fw-normal">Login</h2>
    </div>
    <div class="text-center m-2 mb-4">
        <svg class="bi" width="100" height="100"><use xlink:href="#prov"/></svg>
    </div>

    <form method="post" action="{{route('logear')}}">
        @csrf
        <div class="row g-3 align-items-center">
                <div class="form-group">
                    <label class="form-label">Email: </label>
                    <input required type="email" class="form-control inputB" name="email" placeholder="Direccion de correo..." value="{{old("email")}}">
                    <!--<p class="fv-bold text-danger">{$errors->first('Correo')}}</p>-->
                </div>
                <div class="form-group">
                    <label class="form-label">Contraseña: </label>
                    <input required type="password" class="form-control inputB" name="password" placeholder="Coloca tu contraseña..." value="{{old("password")}}">
                    <!--<p class="fv-bold text-danger">{$errors->first('Correo')}}</p>-->
                </div>
            <div class="text-left">
                <button type="submit" name="btnsaveU" class="btn btn-dark m-3">Verificar y entrar</button>
                <a href="{{route('registerUOut')}}" class="link-secondary">Registrarse</a>
            </div>
        </div>
        <script>

        </script>  
    </form>
</div>

@endsection