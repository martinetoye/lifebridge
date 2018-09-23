<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('post_type');
            $table->text('body');
            $table->text('cat_id')->nullable();
            $table->text('embed_link')->nullable();
            $table->string('post_image')->nullable();
            $table->boolean('has_image')->default(0);
            $table->integer('origin_post_id')->nullable();
            $table->integer('origin_user_id')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
