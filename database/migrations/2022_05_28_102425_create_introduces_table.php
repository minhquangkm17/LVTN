<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('introduces', function (Blueprint $table) {
            $table->increments('id');
            $table->text('post_content');
            $table->string('post_seo_title');
            $table->string('post_seo_desc');
            $table->string('post_seo_keyword');
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
        Schema::dropIfExists('introduces');
    }
};
