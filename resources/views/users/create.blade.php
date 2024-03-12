@extends('layouts.app')
@section('content')
<h1>Crear Usuario</h1>

<div class="container">

      <form action="{{route('users.store')}}" method="POST">
       @csrf
      <div class="mb-3">
             <label for="name" class="form-label">Usuario</label>
             <input type="text" id="name" value="" name="name" class="form-control">

             <div class="mb-3">
             <label for="rol_id" class="form-label">Rol</label>
               <select class="form-select" name="rol_id">
                @foreach($roles as $r)
                  <option value="{{$r->rol_id}}">{{$r->rol_descripcion}}</option>
                @endforeach
              </select>
</div>


             <label for="usu_nombres" class="form-label">Nombres</label>
             <input type="text" id="usu_nombres" value="" name="usu_nombres" class="form-control">

             <label for="usu_telefono" class="form-label">Telefono</label>
             <input type="text" id="usu_telefono" value="" name="usu_telefono" class="form-control">

             <label for="email" class="form-label">Email</label>
             <input type="text" id="email" value="" name="email" class="form-control">

             <label for="password" class="form-label">Password</label>
             <input type="password" id="password" value="" name="password" class="form-control">
      </div>
  
 <button type="submit" class="btn btn-success">Guardar</button>



     

  </div>

@endsection
