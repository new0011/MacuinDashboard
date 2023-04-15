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
<div class='container-fluid'>
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item" aria-current="page"><a href='{{route('home')}}'>Home</a></li>
          <li class="breadcrumb-item" aria-current="page"><a href='{{route('control')}}'>Control de Tickets</a></li>
          <li class="breadcrumb-item active" aria-current="page">Asignar Usuario</li>
        </ol>
    </nav>
</div>
<div class="container-xl" style="color: antiquewhite;">
    <div class="abs-center">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8" style="color: #000066;"><h2>Asignar Auxiliar</h2></div>
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
                    <tr style="background-color: #BFACE2;">
                        <th>ID Auxiliar</th>
                        <th>Correo</th>
                        <th>Nombre</th>
                        <th>Asignar</th>
                        <th>Departamento</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($Aux as $a)
                        <td>{{$a->IDU}}</td>
                        <td>{{$a->email}}</td>
                        <td>{{$a->NombreCompleto}}</td>
                        <td>
                            <form action="{{route('asigAuxiliar.update', $id)}}" method="post">
                                {!! csrf_field() !!}
                                {!! method_field('PUT') !!}
                                <input type="hidden" name="IDAux" value="{{$a->IDU}}">
                                <input type="hidden" name="Status" value="2">
                                <button type="submit" class="btn btn-success">Seleccionar</button>
                            </form>
                        </td>

                        <td>{{$a->NameDep}}</td>
                    </tr>
                    @endforeach
                </tbody>
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
            </table>

        </div>
    </div>
    </div>  
</div>
@stop