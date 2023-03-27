@extends('plantilla')
@section('content')
<style>
body {
    color: #000066;
    background: #f5f5f5;
    font-family: 'Roboto', sans-serif;
}
.abs-center {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 88vh;
}
.table-responsive {
    border-color: black;
    border-style: solid;
    border-radius: 5px;
    margin-top: 10px;
    position: relative;
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
    min-width: 100%;
}
.table-title h2 {
    margin: 8px 0 0;
    font-size: 22px;
}
.search-box {
    position: relative;        
    float: right;
}
.search-box input {
    height: 34px;
    border-radius: 20px;
    padding-left: 35px;
    border-color: #ddd;
    box-shadow: none;
}
.search-box input:focus {
    border-color: #3FBAE4;
}
.search-box i {
    color: #a0a5b1;
    position: absolute;
    font-size: 19px;
    top: 8px;
    left: 10px;
}
table.table tr th, table.table tr td {
    border-color:   black;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table td:last-child {
    width: 130px;
}
table.table td a {
    color: #a0a5b1;
    display: inline-block;
    margin: 0 5px;
}
table.table td a.view {
    color: #03A9F4;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}    
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 95%;
    width: 30px;
    height: 30px;
    color: #4aa60d;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 30px !important;
    text-align: center;
    padding: 0;
}
.pagination li a:hover {
    color: #666;
}	
.pagination li.active a {
    background: #03A9F4;
}
.pagination li.active a:hover {        
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 6px;
    font-size: 95%;
}
a {
  text-decoration: none;
}    
</style>
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
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered" style="background-color: white">
                <thead>
                    <tr style="background-color: #00FA9A;">
                        <th>IDTicket</th>
                        <th>Solicitante</th>
                        <th>Problema</th>
                        <th>Auxiliar</th>
                        <th>Status</th>
                        <th>Comentarios</th>
                        <th>Registro</th>
                        <th>Actualizacion</th>
                        <th>Reporte</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($cT as $cT)
                        <td>{{$cT->IDTick}}</td>
                        <td>{{$cT->Cliente}}</td>
                        <td>{{$cT->Problema}}</td>
                        <td>
                            @if($cT->Auxiliar == 'User')
                                <button type="submit" class="btn btn-success"><a style="color:white;" href="{{route('asigAuxiliar', $cT->IDTick)}}">Asignar</a></button>
                            @else
                                {{$cT->Auxiliar}}
                            @endif
                        </td>
                        <td>{{$cT->Status}}</td>
                        <td>{{$cT->Comentarios}}</td>
                        <td>{{$cT->Registrado}}</td>
                        <td>{{$cT->Editado}}</td>
                        <td>
                            @if($cT->Status != 'En Proceso')
                                <button class="btn btn-primary">Generar Reporte</button>
                            @else
                                <button disabled class="btn btn-secondary">Generar Reporte</button>
                            @endif                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    </div>  
</div>
@stop