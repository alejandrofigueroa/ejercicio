<!DOCTYPE html>
<html>
<head>
    <title>Reporte de asignaciones por cooperante</title>
    <!--<link rel="stylesheet" href="{{ asset('css/app.css') }}">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>Cooperante: {{ $cooperante->nombre_cooperante }}</h1>
  
    <table class="table table-bordered">
        <thead class="thead">
            <tr>
                <th>N.</th>
                <th>Proyecto</th>
                <th>Fecha asignación</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody>
            @forelse($asignaciones_cooperante as $asignacion)
                <tr>
                    <td>{{ $asignacion->id }}</td>
                    <td>{{ $asignacion->nombre_proyecto }}</td>
                    <td>{{ $asignacion->fecha_asignacion }}</td>
                    <td>${{ $asignacion->monto }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"><center>No posee proyectos asignados</center></td>
                </tr>
            @endforelse
            @if($suma_total_asignacion > 0)
                <tr>
                    <td></td>
                    <td></td>
                    <td><b>Total</b></td>
                    <td><b>${{ $suma_total_asignacion }}</b></td>
                </tr>
            @endif
        </tbody>
    </table>
  
</body>
</html>