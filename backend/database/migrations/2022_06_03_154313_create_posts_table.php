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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_reference_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('content',255);
            $table->boolean('has_img');
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on('users');
            $table->foreign("post_reference_id")->references("id")->on('posts');
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
};
