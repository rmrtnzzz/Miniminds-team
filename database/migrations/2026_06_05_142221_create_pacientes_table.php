<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('pacientes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('nombre');
        $table->string('apellido');
        $table->date('fecha_nacimiento')->nullable();
        $table->enum('genero', ['masculino', 'femenino', 'otro'])->nullable();
        $table->integer('edad')->nullable();
        $table->string('foto')->nullable();
        $table->timestamps();
    });
}
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
