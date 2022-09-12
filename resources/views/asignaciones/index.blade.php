@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h1>{{ __('Listado de Asignaciones') }}</h1>
                            </span>
                            <div class="float-right">
                                <a href="{{ route('asignaciones.create') }}" class="btn btn-primary float-right"  data-placement="left">
                                        <i class="fa fa-fw fa-plus"></i>
                                        {{ __('Nueva Asignación') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tabla-asignacion" class="table table-striped table-bordered table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>
                                        <th>Cooperante</th>
                                        <th>Proyecto</th>
                                        <th>Fecha de asignación</th>
                                        <th>Monto</th>
                                        <th>Operaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($asignaciones as $asignacion)
                                        <tr>
                                            <td>{{ $asignacion->id }}</td>
                                            <td>{{ $asignacion->nombre_cooperante }}</td>
                                            <td>{{ $asignacion->nombre_proyecto }}</td>
                                            <td>{{ $asignacion->fecha_asignacion }}</td>
                                            <td>{{ $asignacion->monto }}</td>
                                            <td>
                                                <form action="{{ route('asignaciones.destroy',$asignacion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('asignaciones.edit',$asignacion->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Seguro de que quieres eliminarlo?')"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7"><center>NO SE HAN ENCONTRADO RESULTADOS</center></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#tabla-asignacion').DataTable();
        });
    </script>
@endsection
