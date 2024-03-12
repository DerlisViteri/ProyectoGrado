@extends('layouts.app')

@section('content')

<h1>Esta en la vista index de cursos</h1><br><br>
<a href="{{route('cursos.create')}}" class="btn btn-info">Nuevo Curso</a>
<table class="table">
 
    <tr>
      <th>#</th>
      <th>Titulo</th>
      <th>Descripcion</th>
      <th>Grupo</th>
      <th>Estado</th>
      <th>Acciones</th>
    </tr>

    @foreach($cursos as $c)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$c->cur_titulo}}</td>
        <td>{{$c->cur_descripcion}}</td>
        <td>{{$c->cur_grupo}}</td>
        <td>{{$c->cur_estado ==1?'Activo':'Inactivo'}}</td>
        <td>
          <div class="btn-group">
           <a href="{{route('cursos.edit',$c->cur_id)}}" class="btn btn-info btn-sm">
           <i class="bi bi-pencil"></i></a>
           <form action="{{route('cursos.destroy',$c->cur_id)}}" method="POST" onsubmit="return confirm('Desea eliminar el curso?')">
           @csrf
           @method('DELETE')
           <button  type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
           </form>
</div>
        </td>
    </tr>
    @endforeach
    
  </table>

@endsection
