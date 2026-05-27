@extends('layouts.app')

@section('title', 'Detalle de nota')

@section('content')
    <article class="note-detail">
        <div class="note-detail__header">
            <div>
                <p class="eyebrow">Detalle de nota</p>
                <h1>{{ $nota->titulo }}</h1>
            </div>

            <div class="note-card__top">
                <span class="badge">{{ $nota->categoria }}</span>
                @if ($nota->fijada)
                    <span class="pin-badge">Fijada</span>
                @endif
            </div>
        </div>

        <dl class="detail-grid">
            <div>
                <dt>Creada</dt>
                <dd>{{ $nota->created_at->format('d/m/Y H:i') }}</dd>
            </div>
            <div>
                <dt>Actualizada</dt>
                <dd>{{ $nota->updated_at->format('d/m/Y H:i') }}</dd>
            </div>
            <div>
                <dt>Estado</dt>
                <dd>{{ $nota->fijada ? 'Sí, fijada' : 'Sin fijar' }}</dd>
            </div>
        </dl>

        <div class="note-body">
            {{ $nota->contenido }}
        </div>

        <div class="acciones">
            <a href="{{ route('notas.index') }}" class="btn btn-secondary">
                Volver
            </a>

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
@endsection
