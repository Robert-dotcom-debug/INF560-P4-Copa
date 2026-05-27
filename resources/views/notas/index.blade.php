@extends('layouts.app')

@section('title', 'Notas')

@section('content')
    <div class="page-heading">
        <h1>Notas</h1>

        <a href="{{ route('notas.create') }}" class="btn btn-primary">
            Nueva nota
        </a>
    </div>

    @if ($notas->count())
        <div class="notes-grid">
            @foreach ($notas as $nota)
                @php
                    $categoriaClase = match ($nota->categoria) {
                        'Personal' => 'note-card--personal',
                        'Trabajo' => 'note-card--trabajo',
                        'Estudio' => 'note-card--estudio',
                        'Ideas' => 'note-card--ideas',
                        default => 'note-card--default',
                    };
                @endphp

                <article class="note-card {{ $categoriaClase }}">
                    <div class="note-card__top">
                        <span class="badge">{{ $nota->categoria }}</span>

                        @if ($nota->fijada)
                            <span class="pin-badge">Fijada</span>
                        @endif
                    </div>

                    <h2>
                        <a href="{{ route('notas.show', $nota) }}">{{ $nota->titulo }}</a>
                    </h2>

                    <p class="note-preview">{{ \Illuminate\Support\Str::limit($nota->contenido, 150) }}</p>

                    <div class="acciones">
                        <a href="{{ route('notas.edit', $nota) }}" class="btn btn-warning">
                            Editar
                        </a>

                        <form
                            action="{{ route('notas.destroy', $nota) }}"
                            method="POST"
                            onsubmit="return confirm('¿Está seguro de eliminar esta nota?');"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="pagination-wrap">
            {{ $notas->links() }}
        </div>
    @else
        <section class="empty-state">
            <h2>No existen notas registradas todavía.</h2>
            <p>Crea tu primera nota para guardar apuntes, ideas o pendientes importantes.</p>
            <a href="{{ route('notas.create') }}" class="btn btn-primary">
                Crear nota
            </a>
        </section>
    @endif
@endsection
