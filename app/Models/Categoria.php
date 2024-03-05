<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categorias';
    protected $fillable = [
        'nombre',
    ];

    #llamamos a los hijos de categoria para la relacion
    public function libro_categoria()
    {
        return $this->hasMany(libro_categoria::class, 'categoria_id');
    }
}
