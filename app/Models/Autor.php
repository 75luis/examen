<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'autors';
    protected $fillable = [
        'nombre',
    ];

    #llamamos a los hijos de autors
    public function libros()
    {
        return $this->hasMany(Libro::class, 'autor_id');
    }

}
