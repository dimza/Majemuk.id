<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widgets', function (Blueprint $table) {
            $table->increments('id');                 
            $table->string('about_news_title');
            $table->text('about_news');
            $table->string('social_media_title');
            $table->text('social_media_code');
            $table->string('contact_title');
            $table->string('contact_address');
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->string('social_facebook');
            $table->string('social_twitter');
            $table->string('social_linkedin');
            $table->string('social_dribbble');
            $table->string('social_youtube');
            $table->string('social_behance');
            $table->string('featured_title');
            $table->string('featured_post_limit');             
            $table->text('header_advertise');
            $table->text('sidebar_advertise'); 
            $table->string('recent_posts_title');
            $table->integer('recent_posts_limit')->length(2);
            $table->string('popular_posts_title');
            $table->integer('popular_posts_limit')->length(2);
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('widgets');
    }
}
