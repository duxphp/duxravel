<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_level', function (Blueprint $table) {
            $table->increments('level_id');
            $table->char('name', 20)->nullable()->default('')->comment('等级名称');
            $table->integer('growth')->nullable()->default(0)->comment('成长值');
            $table->boolean('type')->nullable()->default(0)->comment('0普通 1招募');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_level');
    }
}
