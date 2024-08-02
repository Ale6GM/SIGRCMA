<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relacion de uno a muchos polimorfica inversa con el modelo reporte

    public function trabajable() {
        return $this->morphTo();
    }
}
