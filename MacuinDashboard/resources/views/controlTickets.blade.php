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
</style>

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
                        <th>Status</th>
                        <th>Auxiliar</th>
                        <th>Fecha</th>
                        <th>Comentarios</th>
                        <th>Departamento</th>
                        <th>Reporte</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Thomas Hardy</td>
                        <td>No funciona la impresora</td>
                        <td>Corregido</td>
                        <td>Pepe</td>
                        <td>16/02/2023</td>
                        <td>Servicio Eficiente</td>
                        <td>Contabilidad</td>
                        <td>
                            <button class="btn btn-primary">Generar Reporte</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Maria Anders</td>
                        <td>No funciona la impresora</td>
                        <td>En espera</td>
                        <td><button type="submit" class="btn btn-success"><a style="color:white;" href="{{route('asigAuxiliar')}}">Asignar</a></button></td>
                        <td>01/03/2023</td>
                        <td>>:c</td>
                        <td>Recursos Humanos</td>
                        <td><button disabled type="submit" class="btn btn-secondary">Generar Reporte</button></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    </div>  
</div>
@stop