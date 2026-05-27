@php
    $categorias = \App\Models\Nota::CATEGORIAS;
@endphp

<div class="form-grid">
    <div class="field field--wide">
        <label for="titulo">Título</label>
        <input
            type="text"
            id="titulo"
            name="titulo"
            value="{{ old('titulo', $nota->titulo ?? '') }}"
            maxlength="120"
            placeholder="Ej. Ideas para la práctica"
            required
        >
    </div>

    <div class="field">
        <label for="categoria">Categoría</label>
        <select id="categoria" name="categoria" required>
            <option value="">Seleccione una categoría</option>
            @foreach ($categorias as $categoria)
                <option
                    value="{{ $categoria }}"
                    @selected(old('categoria', $nota->categoria ?? '') === $categoria)
                >
                    {{ $categoria }}
                </option>
            @endforeach
        </select>
    </div>

    <label class="check-field">
        <input
            type="checkbox"
            name="fijada"
            value="1"
            @checked(old('fijada', $nota->fijada ?? false))
        >
        <span>
            <strong>Fijar nota</strong>
            <small>Aparecerá primero en el listado.</small>
        </span>
    </label>

    <div class="field field--wide">
        <label for="contenido">Contenido</label>
        <textarea
            id="contenido"
            name="contenido"
            placeholder="Escribe el contenido de la nota..."
            required
        >{{ old('contenido', $nota->contenido ?? '') }}</textarea>
    </div>
</div>

<div class="form-actions">
    <button type="submit" class="btn btn-primary">
        Guardar
    </button>

    <a href="{{ route('notas.index') }}" class="btn btn-secondary">
        Cancelar
    </a>
</div>
