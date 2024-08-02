<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->date('fecha_cierre')->nullable();

            $table->foreignId('repestado_id')->constrained('repestados');
            $table->foreignId('clientes_id')->constrained('clientes');
            $table->foreignId('establecimientos_id')->constrained('establecimientos');
            $table->foreignId('tecnicos_id')->constrained('tecnicos');
            
            
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
