<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIpsBaneadasTable extends Migration
{
    public function up()
    {
        Schema::create('ips_baneadas', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 45)->unique();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('motivo')->nullable();
            $table->timestamp('baneada_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ips_baneadas');
    }
}
