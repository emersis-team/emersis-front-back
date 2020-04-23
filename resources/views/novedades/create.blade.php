@extends('layouts.main')

@section('title', 'Crear novedad')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mx-auto">
            <h3>Creación de novedad</h3>

            <form method="POST" action="{{ route('novedades.store') }}" enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <label>* Título de la novedad </label>
                    <input type="text" name="titulo" value="{{ old('titulo') }}" class="form-control">
                    {!! $errors->first('titulo','<small>:message</small>') !!}
                </div>

                <div class="form-group">
                    <label>* Texto de la novedad</label>
                    <textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                    {!! $errors->first('descripcion','<small>:message</small>') !!}
                </div>

                <div class="form-group">
                    <label>Activo</label>
                    <input type="checkbox" name="activo" {{ (!empty(old('activo')) ? 'checked' : '') }}>
                </div>

                <div class="text-right">
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </form>

        </div>
    </div>

    @endsection
