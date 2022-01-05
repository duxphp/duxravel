<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form', function (Blueprint $table) {
            $table->increments('form_id');
            $table->char('name', 100)->nullable()->comment('表单名称');
            $table->string('description')->nullable()->comment('表单描述');
            $table->char('menu', 50)->nullable()->comment('菜单名');
            $table->longText('data')->nullable()->comment('表单配置');
            $table->boolean('manage')->nullable()->default(0)->comment('独立管理');
            $table->char('search', 50)->nullable()->comment('搜索字段');
            $table->boolean('audit')->nullable()->default(0)->comment('审核状态');
            $table->boolean('submit')->nullable()->default(0)->comment('外部提交');
            $table->string('tpl_list')->nullable()->comment('列表模板');
            $table->string('tpl_info')->nullable()->comment('详情模板');
            $table->integer('interval')->nullable()->default(10)->comment('search');
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
        Schema::dropIfExists('form');
    }
}
