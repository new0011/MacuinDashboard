@extends('plantilla')
@section('content')
@if((session()->has('confTS')))
<script>
     notie.alert({
        type: 1, 
        text: 'Asignacion de Auxiliar Exitosa ;)',
    })
</script>
@endif

@if($errors->any())
<script>
    notie.alert({
       type: 3, 
       text: 'Error al Asignar :(',
   })
</script>
@endif

<div class='container-fluid'>
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item" aria-current="page"><a href='{{route('home')}}'>Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Control de Tickets</li>
        </ol>
    </nav>
</div>
<div class="container-xl" style="color: antiquewhite;">
    <div class="abs-center">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8" style="color: #000066;"><h2>Control de Tickets</h2></div>
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
                        <th>Solicitante</th>
                        <th>Problema</th>
                        <th>Auxiliar</th>
                        <th>Status</th>
                        <th>Comentario</th>
                        <th>Observacion para Aux</th>
                        <th>Registro</th>
                        <th>Actualizacion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($cT as $cT)
                        <td>{{$cT->IDTick}}</td>
                        <td>{{$cT->Cliente}}</td>
                        <td>{{$cT->Problema}}</td>
                        <td>
                            @if($cT->Auxiliar == 'User' and $cT->Status == 'Sin Asignar')
                                <button type="submit" class="btn btn-success"><a style="color:white;" href="{{route('asigAuxiliar', $cT->IDTick)}}">Asignar</a></button>
                            @else
                                {{$cT->Auxiliar}}
                            @endif
                        </td>
                        <td>{{$cT->Status}}</td>
                        <td>
                            @if($cT->Comentarios == '' and $cT->Status != 'Cancelado')
                                <a href="{{route('controlTickets.comment', $cT->IDTick)}}" class="btn btn-success" title="Edit" data-toggle="tooltip">Escribir...</a>
                            @endif
                            @if($cT->Comentarios == '' and $cT->Status == 'Cancelado')
                                <a href="{{route('controlTickets.comment', $cT->IDTick)}}" class="btn btn-success disabled" title="Edit" data-toggle="tooltip">Escribir...</a>                                
                            @endif

                            @if($cT->Comentarios != '')
                                {{$cT->Comentarios}}
                            @endif
                        </td>
                        <td>
                            @if($cT->Observaciones == '' and $cT->Auxiliar != 'User')
                                <a href="{{route('controlTickets.observ', $cT->IDTick)}}" class="btn btn-success" title="Edit" data-toggle="tooltip">Escribir...</a>
                            @endif
                            @if($cT->Auxiliar == 'User')
                                <a href="{{route('controlTickets.observ', $cT->IDTick)}}" class="btn btn-success disabled" title="Edit" data-toggle="tooltip">Escribir...</a>
                            @endif
                            @if($cT->Auxiliar != 'User' and $cT->Observaciones != '')
                                {{$cT->Observaciones}}
                            @endif
                        </td>
                        <td>{{$cT->Registrado}}</td>
                        <td>{{$cT->Editado}}</td>
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