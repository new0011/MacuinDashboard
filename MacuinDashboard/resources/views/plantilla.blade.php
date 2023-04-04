<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MacuinDashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">
    <style>
      /* override styles here */
      .notie-container {
        box-shadow: none;
      }
    </style>

  <style>
      footer{
          position: fixed;
          width: 100%;
          background-color:#7430f9;
          left:0px;
          bottom:0px;
      }

      .bi{
          vertical-align: -.125em;
          fill: currentColor;
      }
  </style>

  </head>
<body style="background-color: #BFACE2;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand ml-5" href="{{route('home')}}">Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
          <ul class="navbar-nav mr-auto">
            @if(auth()->user()->id == 1)
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="http://example.com/" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuarios</a>
              <div class="dropdown-menu" aria-labelledby="dropdown09">
                <a class="dropdown-item" href="{{route('registerU')}}">Registrar Usuario</a>
                <a class="dropdown-item" href="{{route('consUser')}}">Consultar Usuario</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="http://example.com/" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Departamentos</a>
              <div class="dropdown-menu" aria-labelledby="dropdown09">
                <a class="dropdown-item" href="{{route('registerD')}}">Registrar Departamentos</a>
                <a class="dropdown-item" href="{{route('consDepart')}}">Consultar Departamento</a>
              </div>
            </li>
            @endif
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="http://example.com/" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ticket</a>
              <div class="dropdown-menu" aria-labelledby="dropdown09">
                @if(auth()->user()->id==1)
                <a class="dropdown-item" href="{{route('control')}}">Control Tickets</a>
                @endif
                @if(auth()->user()->id==3)
                <a class="dropdown-item" href="{{route('consTicketCli.index', auth()->user()->email)}}">Ver Tickets</a>
                <a class="dropdown-item" href="{{route('newTicket')}}">Nuevo Ticket</a>
                @endif
              </div>  
            </li>
            @if(auth()->user()->id==1 || auth()->user()->id==2)
            <li class="nav-item active">
              <a class="nav-link dropdown-toggle" href="http://example.com/" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reportes</a>
              @if(auth()->user()->id==1)
              <div class="dropdown-menu" aria-labelledby="dropdown09">
                <a class="dropdown-item" href="{{route('control')}}">Todos los Tickets</a>
                <a class="dropdown-item" href="{{route('newTicket')}}">Elegir por Auxiliar</a>
              </div> 
              @endif 
            </li>
            @endif
          </ul>
          <ul class="navbar-nav mr-5">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="http://example.com/" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->user()->nameU}}</a>
              <div class="dropdown-menu" aria-labelledby="dropdown09">
                <a class="dropdown-item" href="{{route('editUser', auth()->user()->IDU)}}">Editar Perfil</a>
                <form action="{{route('logout')}}" method="post">
                  {!! csrf_field() !!}
                  <button type="submit" class="dropdown-item">Log Out</button>
                </form>
              </div>
            </li>
          </ul>
          <!--<form method="post" class="form-inline my-2 my-md-0" action="{route('logout')}}">
            csrf
            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
            <button type="submit" name="btnLogout" class="btn btn-dark mr-3">Salir</button>
          </form>-->
        </div>
      </nav>
      <script src="https://unpkg.com/notie"></script>
      @yield('content')
</body>
</html>