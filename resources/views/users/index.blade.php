@extends('layouts.app')
@section('content')
<h1>Vista de USUARIOS</h1>
<a href="{{route('users.create')}}" class="btn btn-info">Nuevo Usuario</a>
<table class="table">
    <tr>
        <th>#</th>
        <th>Usuario</th>
        <th>Rol</th>
        <th>Nombres</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Acciones</th>

    </tr>
    @foreach($users as $u)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$u->name}}</td>
        <td>{{$u->rol_descripcion}}</td>
        <td>{{$u->usu_nombres}}</td>
        <td>{{$u->usu_telefono}}</td>
        <td>{{$u->email}}</td>
      <td>
        <div class="btn-group">
           <a href="{{route('users.edit',$u->usu_id)}}" class="btn btn-info btn-sm">
           <i class="bi bi-pencil"></i></a>
           <form action="{{route('users.destroy',$u->usu_id)}}" method="POST" onsubmit="return confirm('Desea eliminar el usuario?')">
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