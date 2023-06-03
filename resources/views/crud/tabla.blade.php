@extends('layouts/main')

@section('contenido')
    <p class="fs-2 text-center">Alumnos a detalle</p>
    <div class="card">
        <div class="card-body">
            <table class="table table-dark table-striped table-hover" id="items-table">
                <thead>
                    <tr>
                        <th>Matrícula</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Carrera</th>
                        <th>Hrs Cívicas</th>
                        <th>Hrs Deportivas</th>
                        <th>Hrs Culturales</th>
                        <th>Descripción</th>
                        <th>Descripción Cultural</th>
                        <th>Descripción Deportiva</th>
                        <th>Descripción Cívica</th>
                        <th>Teléfono</th>
                        <th>Fecha</th>
                        <th>Fecha de Ingreso</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->paterno }}</td>
                            <td>{{ $item->materno }}</td>
                            <td>{{ $item->tipo }}</td>
                            <td>{{ $item->horaCivica }}</td>
                            <td>{{ $item->horaDeportiva }}</td>
                            <td>{{ $item->horaCultural }}</td>
                            <td>{{ $item->descripcion }}</td>
                            <td>{{ $item->descripcionCultural }}</td>
                            <td>{{ $item->descripcionDeportiva }}</td>
                            <td>{{ $item->descripcionCivica }}</td>
                            <td>{{ $item->telefono }}</td>
                            <td>{{ $item->fecha }}</td>
                            <td>{{ $item->fechaIngreso }}</td>
                            <td>
                                <a href="{{ route('edit', $item->id) }}" class="btn btn-warning">Editar</a>
                            </td>
                            <td>
                                <a href="{{ route('show', $item->id) }}" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(function() {
            $('#items-table').DataTable({
                "scrollX": true,
                "responsive": true,
                "buttons": ["excel", "csv", "pdf"]
            });
        });
    </script>
@endsection
