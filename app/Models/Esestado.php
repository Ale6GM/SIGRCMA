<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Esestado extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Relacion de uno a muchos con el modelos establecimientos
    public function establecimientos() {
        return $this->hasMany(Establecimiento::class);
    } 
}
