<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorApiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_api', function (Blueprint $table) {
            $table->integer('api_id', true);
            $table->char('method', 6)->nullable()->index('method')->comment('动作');
            $table->char('name', 50)->nullable()->index('name')->comment('名称');
            $table->char('desc', 50)->nullable()->index('date')->comment('描述');
            $table->integer('date')->nullable()->default(0)->index('desc')->comment('日期');
            $table->integer('pv')->nullable()->default(1)->comment('访问量');
            $table->integer('uv')->nullable()->default(0)->comment('访客量');
            $table->char('min_time', 30)->nullable()->comment('最小响应');
            $table->char('max_time', 30)->nullable()->comment('最大响应');
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
        Schema::dropIfExists('visitor_api');
    }
}
