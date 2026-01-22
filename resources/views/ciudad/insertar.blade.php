@extends("_layout.base")
@section("contenido")
<div>
    <h1>Insertar Ciudad</h1>
    <form method="post">
        @csrf

        <div class="form-group row">
            <label for="id" class="col-4 col-form-label">Id</label>
            <div class="col-8">
                <input id="id" name="id" type="text" class="form-control" value="{{ $ciudad->id }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="nombre" class="col-4 col-form-label">Nombre</label>
            <div class="col-8">
                <input id="nombre" name="nombre" type="text" class="form-control" value="{{ $ciudad->nombre }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="poblacion" class="col-4 col-form-label">Población</label>
            <div class="col-8">
                <input id="poblacion" name="poblacion" type="text" class="form-control" value="{{ $ciudad->poblacion }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>
@endsection()