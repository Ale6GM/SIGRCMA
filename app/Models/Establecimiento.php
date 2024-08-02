<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Relacion de uno a muchos inversa con el modelo cliente

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    // Relacion de uno a muchos inversa con el modelo EsEstado
    public function estado() {
        return $this->belongsTo(Esestado::class, 'esestado_id');
    }

     //Relacion de uno a muchos con el modelo reportes

     public function reportes() {
        return $this->hasMany(Reporte::class);
     }
}
