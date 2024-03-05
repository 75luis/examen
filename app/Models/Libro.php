<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Libro extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'libros';
    protected $fillable = [
        'nombre',
        'autor_id'
    ];

    #llamamos a los hijos de libros y sus relaciones con reserva y resenia
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'libro_id');
    }

    public function resenias()
    {
        return $this->hasMany(Reseña::class, 'libro_id');
    }

    #llamamos al padre de libros
    public function autores()
    {
        return $this->belongsTo(Autor::class, 'autor_id');
    }

    #llamamos a los hijos de categoria para la relacion
    public function libro_categoria()
    {
        return $this->hasMany(libro_categoria::class, 'libro_id');
    }


}
