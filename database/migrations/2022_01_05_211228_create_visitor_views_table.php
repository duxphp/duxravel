<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_views', function (Blueprint $table) {
            $table->increments('view_id');
            $table->string('has_type')->nullable()->index('has_type')->comment('关联类型');
            $table->integer('has_id')->default(0)->index('has_id')->comment('关联id');
            $table->integer('pv')->default(0)->comment('浏览量');
            $table->integer('uv')->default(0)->comment('访客量');
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
        Schema::dropIfExists('visitor_views');
    }
}
