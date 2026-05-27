<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    public const CATEGORIAS = [
        'Personal',
        'Trabajo',
        'Estudio',
        'Ideas',
    ];

    protected $fillable = [
        'titulo',
        'contenido',
        'categoria',
        'fijada',
    ];

    protected $casts = [
        'fijada' => 'boolean',
    ];
}
