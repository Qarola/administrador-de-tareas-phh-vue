<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPasswordConfiguredToUsersTable extends Migration
{
    /**
     * para aplicar los cambios en la base de datos
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('password_configured')->default(false)->after('is_admin');
        });
    }

    /**
     *  para revertir la migración si es necesario
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('password_configured');
        });
    }
}
