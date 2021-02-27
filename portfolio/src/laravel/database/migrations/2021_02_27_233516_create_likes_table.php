<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->nullable();
            $table->foreignId('comment_id')->nullable();
            $table->string('ip_address', 127)->comment('IPアドレス');
            $table->timestamps();

            // 外部参照
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('comment_id')->references('id')->on('article_comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
