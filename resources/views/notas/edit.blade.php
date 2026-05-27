@extends('layouts.app')

@section('title', 'Editar nota')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Edición</p>
            <h1>Editar nota</h1>
        </div>
    </div>

    <form class="panel" action="{{ route('notas.update', $nota) }}" method="POST">
        @csrf
        @method('PUT')

        @include('notas._form', ['nota' => $nota])
    </form>
@endsection
