<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relacion de uno a muchos con el modelo establecimientos

    public function establecimientos() {
        return $this->hasMany(Establecimiento::class);
    }

    //Relacion de uno a muchos con el modelo reportes
    public function reportes() {
        return $this->hasMany(Reporte::class);
    }
}
