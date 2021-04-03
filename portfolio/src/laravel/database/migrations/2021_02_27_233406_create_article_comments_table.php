<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id');
            $table->string('name', 50)->comment('お名前');
            $table->string('email', 255)->nullable()->comment('メールアドレス');
            $table->string('content', 255)->comment('コメント本文');
            $table->boolean('permission_flg')->default(false)->comment('承認フラグ');
            $table->timestamps();
            $table->softDeletes();

            // 外部参照
            $table->foreign('article_id')->references('id')->on('articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_comments');
    }
}
