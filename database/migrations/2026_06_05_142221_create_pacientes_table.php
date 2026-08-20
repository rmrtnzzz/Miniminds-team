<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
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
