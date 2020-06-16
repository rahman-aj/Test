<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('on_article');
            $table->unsignedBigInteger('from_user');
            $table->foreign('on_article')
            ->references('id')->on('articles')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('from_user')
            ->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('body');
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
        Schema::dropIfExists('comments');
    }
}
