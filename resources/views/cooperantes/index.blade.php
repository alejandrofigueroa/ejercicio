@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h1>{{ __('Listado de Cooperantes') }}</h1>
                            </span>
                            <div class="float-right">
                                <a href="{{ route('cooperantes.create') }}" class="btn btn-primary float-right"  data-placement="left">
                                    <i class="fa fa-fw fa-plus"></i>
                                    {{ __('Nuevo Cooperante') }}
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
                            <table id="tabla-cooperante" class="table table-striped table-bordered table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Direccion</th>
                                        <th>Operaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cooperantes as $cooperante)
                                        <tr>
                                            <td>{{ $cooperante->id }}</td>
                                            <td>{{ $cooperante->nombre_cooperante }}</td>
                                            <td>{{ $cooperante->email_cooperante }}</td>
                                            <td>{{ $cooperante->direccion_cooperante }}</td>
                                            <td>
                                                <form action="{{ route('cooperantes.destroy',$cooperante->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('cooperantes.edit',$cooperante->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    <a class="btn btn-sm btn-info" href="{{ route('reporte.pdf', $cooperante->id) }}" style="color: white;" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>Informe</a>
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
            $('#tabla-cooperante').DataTable();
        });
    </script>
@endsection
