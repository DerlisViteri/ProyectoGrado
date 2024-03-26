@extends('layouts.app')
@section('content')
<h1>Vista genera ordenes</h1>

<form action="{{route('generarOrdenes')}}" method="POST">
  @csrf
<div style="display: flex; ">
    <select name="anl_id" id="anl_id" class="form-control">
        @foreach ($periodos as $p)
            <option value="{{$p->id}}">{{$p->anl_descripcion}}</option>
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



<table class="table" >
    <thead>
        <tr>
            <th>Género Órdenes</th>
        </tr>
        <tr>
            <th>Secuencial</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ordenes as $o)
        <tr>
            <td>{{$o->secuencial}}</td>
            <td>{{$o->fecha_registro}}</td>
            <td><!-- Aquí puedes añadir acciones si las hay --></td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection