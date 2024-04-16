@extends('layouts.app')

@section('content')
<script>
    $(document).on("click", ".btn_delete", function(){
        if (confirm("Seguro desea eliminar?")) {
            const secuencial = $(this).attr('secuencial');
            $('#secuencial').val(secuencial);
            $('#frmEliminar').submit();
        }
    });
</script>

<form action="{{route('eliminarOrden')}}" method="POST" id="frmEliminar">
    @csrf
    <input type="text" name="secuencial" id="secuencial" value="0" hidden/>
</form>

<div class="container">
    <h1 class="text-center mb-4">VISTA GENERA ORDENES</h1>

    <form action="{{ route('generarOrdenes') }}" method="POST" id="orderForm">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="form-group row">
                    <div class="col-md-8">
                        <select name="anl_id" id="anl_id" class="form-control">
                            @foreach ($periodos as $p)
                            <option value="{{ $p->id }}">{{ $p->anl_descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group row">
                    <div class="col-md-8">
                        <select name="jor_id" id="jor_id" class="form-control">
                            @foreach ($jornadas as $j)
                            <option value="{{ $j->id }}">{{ $j->jor_descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group row">
                    <div class="col-md-8">
                        <select name="mes" id="mes" class="form-control">
                            @foreach ($meses as $key => $m)
                            <option value="{{ $key }}">{{ $m }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block btn-animate">
                            <i class="fas fa-calendar-plus mr-2"></i> Generar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    
    <div class="container mt-4">
    <h4>Ordenes Generadas</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-light table-sm">
            <thead class="thead-light">
                <tr>
                    <th class="bg-primary text-light">Secuencial</th>
                    <th class="bg-primary text-light">Fecha</th>
                    <th class="bg-primary text-light">Jornada</th>
                    <th class="bg-primary text-light">Mes</th>
                    <th class="bg-primary text-light">Año Lectivo</th>
                    <th class="bg-primary text-light">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ordenes as $o)
                <tr>
                    <td>{{ $o->especial }}</td>
                    <td>{{ $o->fecha }}</td>
                    <td>{{ $o->jor_descripcion }}</td>
                    <td>{{ $meses[$o->mes] }}</td>
                    <td>{{ $o->anl_descripcion }}</td>
                    <td>
                        <!-- Botón para ver -->
                        <a href="`{{route('genera_ordenes.show')}}" class="btn btn-outline-info btn-sm mr-1">
                            <i class="fas fa-eye"></i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                 <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                 <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                               </svg>
                        </a>
                        <!-- Botón para eliminar -->
                        <a class="btn btn-outline-danger btn-sm btn_delete" secuencial="{{$o->especial}}">
                            <i class="fas fa-trash"></i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                 <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                               </svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
