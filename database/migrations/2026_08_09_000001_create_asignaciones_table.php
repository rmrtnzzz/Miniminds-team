<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionesTable extends Migration
{
    public function up()
    {
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->id();

            $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('cascade');
            $table->foreignId('profesional_id')->constrained('profesionales')->onDelete('cascade');

            $table->enum('tipo', ['terapia', 'juego'])->default('terapia');
            $table->string('titulo');
            $table->text('descripcion')->nullable();

            
            $table->string('juego_ruta')->nullable();

            $table->enum('estado', ['activa', 'completada'])->default('activa');
            $table->text('nota_completado')->nullable();
            $table->timestamp('completada_at')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('asignaciones');
    }
}
