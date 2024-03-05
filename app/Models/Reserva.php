<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $fillable = [
        'usuario_id',
        'libro_id',
    ];
    #traer la info de usuarios
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    #traer la info de libro
    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libro_id');
    }
}
