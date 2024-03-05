<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'usuarios';
    protected $fillable = [
        'nombre',
    ];

    #llamamos a los hijos de usuarios
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'usuario_id');
    }

    public function resenias()
    {
        return $this->hasMany(Reseña::class, 'usuario_id');
    }


}
