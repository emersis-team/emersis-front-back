@extends('layouts.main')

@section('title', 'Novedad | ' . $novedad->titulo)

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="mb-0">{{$novedad->titulo}}</h1>
                <div class="btn-group">
                    <a href="{{ route('novedades.edit', $novedad)}}" class="btn btn-sm btn-primary">Editar</a>
                    <form method="POST" action="{{ route('novedades.destroy', $novedad)}}" style="padding-left: 10px;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="teaser_4_8_box">
                <div class="row">
                    <div class=" col-sm-8">
                        <p>{{ $novedad->descripcion}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
