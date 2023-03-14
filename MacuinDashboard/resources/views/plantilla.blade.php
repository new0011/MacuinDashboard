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
<body style="background-color: #00FA9A">
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
        <a class="navbar-brand" href="">Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="http://example.com/" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuarios</a>
              <div class="dropdown-menu" aria-labelledby="dropdown09">
                <a class="dropdown-item" href="{{route('registerU')}}">Registrar Usuario</a>
                <a class="dropdown-item" href="{{route('consDepart')}}">Consultar Usuario</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="http://example.com/" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Departamentos</a>
              <div class="dropdown-menu" aria-labelledby="dropdown09">
                <a class="dropdown-item" href="#">Resgitrar Departamentos</a>
                <a class="dropdown-item" href="{{route('consDepart')}}">Consultar Departamento</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('control')}}">Tickets</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-md-0">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
          </form>
        </div>
      </nav>
      @yield('content')
</body>
</html>