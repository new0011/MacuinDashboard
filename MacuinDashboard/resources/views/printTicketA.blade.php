<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Imprimir Ticket de Jefe</title>
    <style>
        body {
            font-family: sans-serif;
        }

        table{
            border-collapse: collapse;
            vertical-align: middle;
            border: 1px solid black;
        }

        h1 {
            font-weight: bold;
            font-size: 24px;
            text-align: center;
            color: #333;
            border-color: black;
            margin-bottom: 16px;
        }

        thead {
            background-color: #333;
            color: white;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 2%;
        }

        th, td {
            border: 1px solid black;
            margin: 5px;
            padding: 8px;
        }

        thead th {
            width: 2%;
            text-align: center;
        }

        tbody tr:nth-child(odd) {
            background-color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h1>Tickets Macuin Dashboard</h1>
    <table>
        <thead>
            <tr>
                <th>IDTicket</th>
                <th>Problema</th>
                <th>Status</th>
                <th>Comentario para el Cliente</th>
                <th>Observaciones</th>
                <th>Registro</th>
                <th>Actualizacion</th>
                <th>Cambiar Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cT as $c)
            <tr>
                    <td>{{$c->IDTick}}</td>
                    <td>{{$c->Problema}}</td>
                    <td>{{$c->Status}}</td>
                    <td>@if($c->Comentarios == '')
                            Sin comentarios aun.
                        @else
                        {{$c->Comentarios}}
                        @endif
                    </td>
                    <td>                                
                        @if($c->Observaciones == '')
                            Sin observaciones aun.
                        @else
                            {{$c->Observaciones}}
                        @endif
                    </td>
                    <td>{{$c->Registrado}}</td>
                    <td>{{$c->Editado}}</td>
                    <td>@if($c->Status == 'Asignado' or $c->Status == 'En Proceso')
                        <a href="{{route('consTicketAux.changeS', $c->IDTick)}}" class="btn btn-success" title="Edit" data-toggle="tooltip">Elegir...</a>
                        @else
                        Terminado
                        @endif
                    </td>
            </tr>
                @endforeach
        </tbody>
    </table>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
