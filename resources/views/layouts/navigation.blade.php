<div class="container-fluid bg-dark">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand text-white" href="{{route('dashboard')}}">INICIO</a>
      <a class="navbar-brand text-white" href="{{route('cursos.index')}}">CURSOS</a>

      <div class="navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              {{Auth::user()->usu_nombres}}
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="{{route('profile.edit')}}">Perfil</a></li>
              <li><a class="dropdown-item" onclick="event.preventDefault();cerrarSession.submit()">Cerrar Sesión</a></li>
              <form action="{{route('logout')}}" id="cerrarSession" method="POST">
                @csrf
              </form>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
