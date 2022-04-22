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
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigInteger('user_id');
            $table->string('description',255)->nullable();
            $table->string('link',255)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('profile_photo_path',255)->nullable();
            $table->string('profile_banner_path',255)->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('profiles');
    }
};
