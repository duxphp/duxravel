<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api', function (Blueprint $table) {
            $table->increments('api_id');
            $table->string('name')->nullable()->comment('接口名');
            $table->char('secret_id', 20)->nullable()->index('secret_id')->comment('接口id');
            $table->char('secret_key', 32)->nullable()->comment('接口密钥');
            $table->boolean('status')->nullable()->default(0)->index('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api');
    }
}
