@extends('layouts.main')

@section('title', 'Novedades')
@section('content')

<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0" style="margin-top: 30px; color: #d65252;">Últimas novedades</h1>
        <div class="btn-group">

            <button class="btn btn-sm btn-default" style="background-color: #2aa2b6;">
                <a href="{{ route('novedades.create')}}" role="button" style="color: white;">Crear una NOVEDAD</a>
            </button>
        </div>
    </div>

    @foreach ($novedades as $novedadItem)

        <div class="row novedad" style="margin-top: 30px;margin-bottom: 20px;">
            <div class="col-sm-12 nv-content">

                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h2 class="mb-0">{{$novedadItem->titulo}}</h2>
                        <div class="btn-group">
                            <a href="{{ route('novedades.edit', $novedadItem)}}" class="btn btn-sm btn-primary">Editar</a>
                            <form method="POST" action="{{ route('novedades.destroy', $novedadItem)}}" style="padding-left: 10px;">
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
                                <p style="margin-bottom: 0;font-weight: bold;">
                                    @if ($novedadItem->activo != 0)
                                        <strong style="color: #25a43f;">Activo</strong>
                                    @else
                                    <strong style="color: #d65252;">Inactivo</strong>
                                    @endif
                                    <br>({{ $novedadItem->updated_at->diffForHumans()}})</p>
                                <br>
                                <p>{{ $novedadItem->descripcion}}</p>
                            </div>
                        </div>
                    </div>
                    <strong>
                        <a href="{{ route('novedades.show' , $novedadItem) }}">Ver más</a>
                    </strong>
                </div>
            </div>
        </div>

    @endforeach

    {{ $novedades ?? ''->links() }}

</div>
@endsection
