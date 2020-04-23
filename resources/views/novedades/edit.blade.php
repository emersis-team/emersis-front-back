@extends('layouts.main')

@section('title', 'Editar novedad')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mx-auto">
            <h3>Editar novedad</h3>

            <form method="POST" action="{{ route('novedades.update', $novedad) }}" enctype='multipart/form-data'>
                @csrf @method('PATCH')

                <div class="form-group">
                    <label>* Título de la novedad </label>
                    <input type="text" name="titulo" value="{{ old('titulo',$novedad->titulo) }}" class="form-control">
                    {!! $errors->first('titulo','<small>:message</small>') !!}
                </div>

                <div class="form-group">
                    <label>* Texto de la novedad</label>
                    <textarea name="descripcion" class="form-control">{{ old('descripcion',$novedad->descripcion) }}</textarea>
                    {!! $errors->first('descripcion','<small>:message</small>') !!}
                </div>

                <div class="form-group">
                    <label>Activo</label>
                    @if ($novedad->activo != 0)
                    <input type="checkbox" name="activo" checked>
                    @else
                    <input type="checkbox" name="activo">
                    @endif
                </div>
                <div class="text-right">
                    <button class="btn btn-primary">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
