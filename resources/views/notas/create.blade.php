@extends('layouts.app')

@section('title', 'Crear nota')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Nueva nota</p>
            <h1>Crear nueva nota</h1>
        </div>
    </div>

    <form class="panel" action="{{ route('notas.store') }}" method="POST">
        @csrf

        @include('notas._form')
    </form>
@endsection
