<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repestado extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Relacion de uno a muchos con el modelo reportes

    public function reportes() {
        return $this->hasMany(Reporte::class);
    }
}
