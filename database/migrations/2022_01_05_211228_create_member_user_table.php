<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->integer('level_id')->default(0);
            $table->char('nickname', 50)->nullable()->default('');
            $table->string('email', 100)->nullable()->default('');
            $table->string('tel', 20)->nullable()->default('');
            $table->string('password')->nullable()->default('');
            $table->rememberToken()->default('');
            $table->string('avatar')->nullable()->default('');
            $table->integer('growth')->nullable()->default(0)->comment('成长值');
            $table->json('data')->nullable()->comment('附加数据');
            $table->timestamp('login_at')->nullable()->comment('登录时间');
            $table->string('login_ip')->nullable()->default('')->comment('登录ip');
            $table->boolean('status')->nullable()->default(1);
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
        Schema::dropIfExists('member_user');
    }
}
