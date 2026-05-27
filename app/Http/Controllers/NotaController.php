<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotaRequest;
use App\Http\Requests\UpdateNotaRequest;
use App\Models\Nota;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NotaController extends Controller
{
    public function index(): View
    {
        $notas = Nota::query()
            ->orderByDesc('fijada')
            ->latest()
            ->paginate(10);

        return view('notas.index', compact('notas'));
    }

    public function create(): View
    {
        return view('notas.create');
    }

    public function store(StoreNotaRequest $request): RedirectResponse
    {
        $datos = $request->validated();
        $datos['fijada'] = $request->boolean('fijada');

        $nota = Nota::create($datos);

        return redirect()
            ->route('notas.show', $nota)
            ->with('success', 'La nota fue creada correctamente.');
    }

    public function show(Nota $nota): View
    {
        return view('notas.show', compact('nota'));
    }

    public function edit(Nota $nota): View
    {
        return view('notas.edit', compact('nota'));
    }

    public function update(UpdateNotaRequest $request, Nota $nota): RedirectResponse
    {
        $datos = $request->validated();
        $datos['fijada'] = $request->boolean('fijada');

        $nota->update($datos);

        return redirect()
            ->route('notas.show', $nota)
            ->with('success', 'La nota fue actualizada correctamente.');
    }

    public function destroy(Nota $nota): RedirectResponse
    {
        $nota->delete();

        return redirect()
            ->route('notas.index')
            ->with('success', 'La nota fue eliminada correctamente.');
    }
}