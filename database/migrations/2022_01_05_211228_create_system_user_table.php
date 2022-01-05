<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('nickname', 20)->nullable()->comment('昵称');
            $table->string('username', 20)->comment('用户名');
            $table->string('password')->comment('密码');
            $table->rememberToken()->comment('随机码');
            $table->string('avatar')->nullable()->comment('头像');
            $table->boolean('status')->default(1)->index('status')->comment('状态');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_user');
    }
}
