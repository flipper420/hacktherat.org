<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('theme_id')->unsigned()->default(1);
            $table->foreign('theme_id')->references('id')->on('themes');
            $table->string('location')->nullable();
            $table->text('bio')->nullable();
            $table->string('url')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'unspecified'])->default('unspecified');
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('googleplus')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('avatar_status')->default(0);
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
        Schema::dropIfExists('profiles');
    }
}
