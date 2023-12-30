<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostCommentReplyLikeDislikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_post_comment_reply_like_dislikes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('reply_id');
            $table->string('react')->nullable();
            // $table->foreign('reply_id')->references('id')->on('blog_post_comment_replies')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('blog_post_comment_reply_like_dislikes');
    }
}
