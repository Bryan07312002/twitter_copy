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
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('post_reference_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('content',255);
            $table->boolean('has_img')->default(false);
            $table->timestamps();

            $table->foreign("post_reference_id")->references("id")->on('post');
            $table->foreign("user_id")->references("id")->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
};
