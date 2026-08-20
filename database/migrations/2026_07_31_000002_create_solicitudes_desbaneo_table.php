<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('solicitudes_desbaneo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('justificacion');
            $table->enum('estado', ['pendiente','aprobada','rechazada'])->default('pendiente');
            $table->text('respuesta_admin')->nullable();
            $table->date('fecha_solicitud');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('solicitudes_desbaneo'); }
};
