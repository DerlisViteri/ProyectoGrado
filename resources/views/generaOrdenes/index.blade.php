@extends('layouts.app')
@section('content')
<h2>Genera Ordenes</h2>

<form action="{{route('generarOrdenes')}}" method="POST">
  @csrf
<div style="display: flex; ">
    <select name="anl_id" id="anl_id" class="form-control">
        @foreach ($periodos as $p)
            <option value="{{$p->id}} ">{{$p->anl_descripcion}}</option>
        @endforeach
    </select>

    <select name="jor_id" id="jor_id" class="form-control">
        @foreach ($jornadas as $j)
            <option value="{{$j->id}}">{{$j->jor_descripcion}}</option>
        @endforeach
    </select>

    <select name="mes" id="mes" class="form-control">
        @foreach ($meses as $key=>$m)
            <option value="{{$key}}">{{$m}}</option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-primary">Generar</button>

</div>
</form>

<br>

<style>
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
        border: 1px solid #b399a2; /* Cambio de color de borde */
        padding: 8px;
        text-align: left;
    }

    .table th {
        background-color: #dbf9f0; /* Cambio de color de fondo para encabezados */
    }

    .table tbody tr:nth-child(even) {
        background-color: #ffffff; /* Cambio de color de fondo para filas pares */
    }

    .table tbody tr:hover {
        background-color: #eee5e9; /* Cambio de color de fondo al pasar el cursor */
    }
</style>


<table class="table">
    <thead>
        <tr>
            <th>Secuencial</th>
            <th>Fecha</th>
            <th>Año lectivo</th>
            <th>Mes</th>
            <th>Jornada</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ordenes as $o)
        <tr>
            <td>{{$o->especial}}</td>
            <td>{{$o->fecha}}</td>
            <td>{{$o->anl_descripcion}}</td>
            <td>{{$o->mes}}</td>
            <td>{{$o->jor_descripcion}}</td>
            <td><!-- Aquí puedes añadir acciones si las hay --></td>
        </tr>
        @endforeach
    </tbody>
</table>




@endsection