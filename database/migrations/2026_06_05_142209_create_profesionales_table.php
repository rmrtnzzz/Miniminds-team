<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalesTable extends Migration
{
<<<<<<< HEAD
    
=======
    /**
     * Run the migrations.
     *
     * @return void
     */
>>>>>>> 145eb020648020c9347deba19cb5c971d942ebee
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
