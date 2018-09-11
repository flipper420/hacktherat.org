<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

    public function up()
    {
        Schema::create('categories', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('slug');
            $table->enum('type', array('Mission', 'Library'));
        });
    }

    public function down()
    {
        Schema::drop('categories');
    }
}