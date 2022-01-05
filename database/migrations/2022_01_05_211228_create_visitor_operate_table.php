<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorOperateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_operate', function (Blueprint $table) {
            $table->char('uuid', 36)->unique('uuid')->comment('uuid');
            $table->char('has_type', 50)->nullable()->index('has_type')->comment('关联类型');
            $table->integer('has_id')->default(0)->index('has_id')->comment('关联id');
            $table->string('username', 100)->nullable()->index('username')->comment('用户名');
            $table->char('method', 6)->nullable()->index('method')->comment('动作');
            $table->string('route')->nullable()->index('route')->comment('路由');
            $table->char('name', 50)->nullable()->index('name')->comment('名称');
            $table->char('desc', 50)->nullable()->comment('描述');
            $table->text('params')->nullable()->comment('参数');
            $table->string('ip', 45)->nullable()->comment('ip');
            $table->string('ua')->nullable()->comment('ua');
            $table->char('browser', 50)->nullable()->comment('浏览器');
            $table->char('device', 50)->nullable()->comment('设备');
            $table->boolean('mobile')->default(0)->comment('移动端');
            $table->char('time', 30)->default('0')->comment('记录时间');
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
        Schema::dropIfExists('visitor_operate');
    }
}
