<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['usuario', 'especialista', 'admin'])
                ->default('usuario')
                ->after('email');
        });

        
        
        if (Schema::hasTable('profesionales')) {
            $userIds = \DB::table('profesionales')->pluck('user_id');
            if ($userIds->isNotEmpty()) {
                \DB::table('users')->whereIn('id', $userIds)->update(['role' => 'especialista']);
            }
        }
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
}
