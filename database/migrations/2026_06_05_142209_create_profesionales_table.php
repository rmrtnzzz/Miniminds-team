<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('profesionales', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('nombre');
        $table->string('apellido');
        $table->string('telefono')->nullable();
        $table->date('fecha_nacimiento')->nullable();
        $table->enum('genero', ['masculino', 'femenino', 'otro'])->nullable();
        $table->string('especialidad')->nullable();
        $table->string('foto')->nullable();
        $table->timestamps();
    });
}
}
