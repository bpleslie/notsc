<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracksTable extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('description');
            $table->string('zip');
            $table->bigInteger('user_id');
            $table->smallInteger('type');
            $table->text('image');
            $table->text('file');
            $table->timestamps();
            $table->timestamp('published_at')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('tracks');
    }
}