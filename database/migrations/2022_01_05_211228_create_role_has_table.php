<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleHasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_has', function (Blueprint $table) {
            $table->string('role_type')->nullable();
            $table->integer('user_id')->nullable()->index('user_id')->comment('用户id');
            $table->integer('role_id')->nullable()->index('role_id')->comment('角色id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_has');
    }
}
