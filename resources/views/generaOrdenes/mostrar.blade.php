@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<table class="table table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>Orden</th>
            <th>Matricula</th>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Jornada</th>
            <th>Especialidad</th>
            <th>Curso</th>
            <th>Codigo</th>
            <th>Fecha Registro</th>
            <th>Valor Pagar</th>
            <th>Fecha Pago</th>
            <th>Valor Pagado</th>
            <th>Estado</th>
            <th>Mes</th>
            <th>Secuencial</th>
            <th>Documento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($estudiantes as $e)
        <tr> 
            <td>{{$loop->iteration}}</td>
            <td>{{ $e->ord_id }}</td>
            <td>{{ $e->mat_id }}</td>
            <td>{{ $e->est_cedula }}</td>
            <td>{{ $e->est_nombres }}</td>
            <td>{{ $e->est_apellidos }}</td>
            <td>{{ $e->jor_descripcion }}</td>
            <td>{{ $e->esp_descripcion }}</td>
            <td>{{ $e->cur_descripcion }}</td>
            <td>{{ $e->codigo }}</td>
            <td>{{ $e->fecha }}</td>
            <td>{{ $e->valor }}</td>
            <td>{{ $e->fecha_pago }}</td>
            <td>{{ $e->vpagado }}</td>
            <td>{{ $e->estado==0?'PENDIENTE':'PAGADO' }}</td>
            <td>{{ $e->mes }}</td>
            <td>{{ $e->especial }}</td>
            <td>{{ $e->numero_documento }}</td>
            <td class="d-flex">


                <a href="" class="btn btn-warning btn-sm me-1"> 
                    <span class="material-symbols-outlined">edit</span>
                </a>
                <form action="" method="POST" onsubmit="return confirm('¿Desea eliminar la Orden?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm-1">
                        <span class="material-symbols-outlined">delete</span>
                    </button>
                </form>
            </td>



           
        </tr> <!-- Agregué la etiqueta de cierre </tr> -->
        @endforeach
    </tbody>
</table>



@endsection