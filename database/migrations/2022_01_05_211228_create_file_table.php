<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file', function (Blueprint $table) {
            $table->integer('file_id', true);
            $table->integer('dir_id')->default(0)->index('dir_id')->comment('目录ID');
            $table->string('has_type', 50)->nullable()->index('has_type')->comment('关联类型');
            $table->string('driver', 20)->nullable()->comment('上传驱动');
            $table->string('url')->nullable()->comment('访问地址');
            $table->string('path')->nullable()->comment('上传地址');
            $table->string('title')->nullable()->comment('文件标题');
            $table->string('ext', 20)->nullable()->index('ext')->comment('扩展名');
            $table->integer('size')->default(0)->comment('大小字节');
            $table->string('mime')->nullable()->comment('mime类型');
            $table->string('field', 50)->nullable()->comment('文件字段');
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
        Schema::dropIfExists('file');
    }
}
