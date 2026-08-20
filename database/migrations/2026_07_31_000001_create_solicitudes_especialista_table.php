<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('solicitudes_especialista', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('titulo_profesional');
            $table->string('especialidad');
            $table->integer('anios_experiencia');
            $table->text('motivacion');
            $table->text('formacion');
            $table->integer('puntaje_test')->default(0);
            $table->enum('estado', ['pendiente','aprobada','rechazada'])->default('pendiente');
            $table->text('notas_admin')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('solicitudes_especialista'); }
};
