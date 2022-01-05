<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileDirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_dir', function (Blueprint $table) {
            $table->increments('dir_id');
            $table->string('name')->nullable()->comment('目录名称');
            $table->string('has_type', 20)->nullable()->index('has_type')->comment('关联类型');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_dir');
    }
}
