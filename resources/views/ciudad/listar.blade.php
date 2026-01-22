@extends("_layout.base")
@section("contenido")
<div>
    <h1>Listado de Ciudades</h1>
    <a href="/ciudad/insertar" class="btn btn-outline-primary">Insertar</a><br/>

    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>poblacion</th>
                <th>actualizar</th>
                <th>eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ciudades as $ciudad)
            <tr>
                <td># {{ $ciudad->id }}</td>
                <td>{{ $ciudad->nombre }}</td>
                <td>{{ $ciudad->poblacion }}</td>
                <td><a href='/ciudad/actualizar/{{ $ciudad->id }}' class="btn btn-outline-primary">Actualizar</a></td>
                <td><a href='/ciudad/eliminar/{{ $ciudad->id }}' class="btn btn-outline-primary">Eliminar</a></td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection()