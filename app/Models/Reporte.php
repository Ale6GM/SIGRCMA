<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;

class Reporte extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['fecha_inicio', 'fecha_cierre'];

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

    /* public function scopeAbiertosMasDeTresDias(Builder $query) {
        $fechaLimite = Carbon::now()->subDays(3);

        return $query->where('fecha_inicio', '<' , $fechaLimite)->where('repestado_id', 1);
    } */

    public function scopeAbiertosMasDeTresDias(Builder $query) {
        return $query->where('repestado_id', 1)
                     ->selectRaw('*, DATEDIFF(CURDATE(), fecha_inicio) as dias_abierto')
                     ->having('dias_abierto', '>', 3);
    }

    public function scopeAbiertosMasDeDiezDias(Builder $query) {
        return $query->where('repestado_id', 1)
                     ->selectRaw('*, DATEDIFF(CURDATE(), fecha_inicio) as dias_abierto')
                     ->having('dias_abierto', '>', 10);
    }

    public function scopeAbiertosMasDeQuinceDias(Builder $query) {
        return $query->where('repestado_id', 1)
                     ->selectRaw('*, DATEDIFF(CURDATE(), fecha_inicio) as dias_abierto')
                     ->having('dias_abierto', '>', 15);
    }


}
