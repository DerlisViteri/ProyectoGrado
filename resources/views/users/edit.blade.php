@extends('layouts.app')
@section('content')
  <div class="container">
      <h1>Editar Usuario</h1>

      <form action="{{route('users.update',$user->usu_id)}}" method="POST">
       @csrf
       @method('PUT')
         @include('users.fields')

      </form>

  </div>
@endsection
