<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relacion de uno muchos inversa con el modelo Reestado

    public function repestado() {
        return $this->belongsTo(Repestado::class);
    }

    //Relacion de uno a muchos inversa con el modelo cliente
    public function cliente() {
        return $this->belongsTo(Cliente::class, 'clientes_id');
    }

    //Relacion de uno a muchos inversa con el modelo establecimiento

    public function establecimiento() {
        return $this->belongsTo(Establecimiento::class, 'establecimientos_id');
    }

    //Relacion de uno a muchos inversa con el modelo tecnico

    public function tecnico() {
        return $this->belongsTo(Tecnico::class, 'tecnicos_id');
    }

    //Relacion de uno a muchos inversa con el modelo User

    public function user() {
        return $this->belongsTo(User::class);
    }

    //relacion de uno a muchos polimorfica con el modelo trabajo

    public function trabajos() {
        return $this->morphMany(Trabajo::class, 'trabajable');
    }
}
