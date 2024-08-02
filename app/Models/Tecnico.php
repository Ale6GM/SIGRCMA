<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relacion de uno a muchos con el modelo reporte

    public function reportes() {
        return $this->hasMany(Reporte::class);
    }
}
