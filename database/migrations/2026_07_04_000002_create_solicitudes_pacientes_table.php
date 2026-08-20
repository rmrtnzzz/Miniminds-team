<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesPacientesTable extends Migration
{
    public function up()
    {
        Schema::create('solicitudes_pacientes', function (Blueprint $table) {
            $table->id();

            
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('genero', ['masculino', 'femenino', 'otro'])->nullable();
            $table->integer('edad')->nullable();
            $table->string('foto')->nullable();
            $table->text('motivo')->nullable(); 

            
            $table->enum('estado', ['pendiente', 'aprobada', 'rechazada'])->default('pendiente');
            $table->foreignId('profesional_id')->nullable()->constrained('profesionales')->onDelete('set null');
            $table->foreignId('paciente_id')->nullable()->constrained('pacientes')->onDelete('set null');
            $table->text('nota_revision')->nullable(); 
            $table->timestamp('revisada_at')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('solicitudes_pacientes');
    }
}
