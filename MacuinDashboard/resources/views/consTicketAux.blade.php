@extends('plantilla')
@section('content')
@if((session()->has('confCancel')))
<script>
     notie.alert({
        type: 1, 
        text: 'Cambio de Status Exitoso ;)',
    })
</script>
@endif

@if($errors->any())
<script>
    notie.alert({
       type: 3, 
       text: 'Error al Cancelar, refresca este sitio :(',
   })
</script>
@endif

<div class='container-fluid'>
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item" aria-current="page"><a href='{{route('home')}}'>Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Consulta de Tickets</li>
        </ol>
    </nav>
</div>
<div class="container-xl" style="color: antiquewhite;">
    <div class="abs-center">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8" style="color: #000066;"><h2>Revisar Tickets</h2></div>
                    <div class="col-sm-4">
                        <div class="search-box">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered" style="background-color: white">
                <thead>
                    <tr style="background-color: #BFACE2;">
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
                    <tr>
                        @foreach ($cT as $c)
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
            <script>
                $('th').click(function() {
                    var table = $(this).parents('table').eq(0)
                    var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
                    this.asc = !this.asc
                    if (!this.asc) {
                    rows = rows.reverse()
                    }
                    for (var i = 0; i < rows.length; i++) {
                    table.append(rows[i])
                    }
                    setIcon($(this), this.asc);
                })

                function comparer(index) {
                    return function(a, b) {
                    var valA = getCellValue(a, index),
                        valB = getCellValue(b, index)
                    return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB)
                    }
                }

                function getCellValue(row, index) {
                    return $(row).children('td').eq(index).html()
                }

                function setIcon(element, asc) {
                    $("th").each(function(index) {
                    $(this).removeClass("sorting");
                    $(this).removeClass("asc");
                    $(this).removeClass("desc");
                    });
                    element.addClass("sorting");
                    if (asc) element.addClass("asc");
                    else element.addClass("desc");
                }
            </script>

        </div>
    </div>
    </div>  
</div>
@stop