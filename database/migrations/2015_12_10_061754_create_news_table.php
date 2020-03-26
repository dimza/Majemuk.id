<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cat_id');
            $table->integer('user_id');             
            $table->string('title');
            $table->string('slug');
            $table->longtext('description');
            $table->string('image_title')->nullable(); 
            $table->string('image');
            $table->string('source');
            $table->string('tags');
            $table->string('slider_news')->length(5)->default('no');
            $table->string('featured_news')->length(5)->default('no');
            $table->integer('status')->length(1)->default(1);  
            $table->integer('views');
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
        Schema::drop('news');
    }
}
