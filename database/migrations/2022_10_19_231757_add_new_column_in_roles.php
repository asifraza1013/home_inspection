<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnInRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->integer('role_for')->comment('1: super-admin, 2: admin')->default(1);
        });
        Schema::table('permissions', function (Blueprint $table) {
            $table->integer('permission_for')->comment('1: super-admin, 2: admin')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn('role_for');
        });
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('permission_for');
        });
    }
}
