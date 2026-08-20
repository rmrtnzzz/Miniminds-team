<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddModeracionFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->unsignedInteger('advertencias')->default(0)->after('foto');

            
            $table->unsignedInteger('veces_baneado')->default(0)->after('advertencias');

            $table->boolean('baneado')->default(false)->after('veces_baneado');
            $table->enum('tipo_baneo', ['ninguno', 'temporal', 'permanente'])->default('ninguno')->after('baneado');
            $table->timestamp('baneado_hasta')->nullable()->after('tipo_baneo');
            $table->string('motivo_baneo')->nullable()->after('baneado_hasta');

            
            $table->string('ultima_ip', 45)->nullable()->after('motivo_baneo');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'advertencias',
                'veces_baneado',
                'baneado',
                'tipo_baneo',
                'baneado_hasta',
                'motivo_baneo',
                'ultima_ip',
            ]);
        });
    }
}
