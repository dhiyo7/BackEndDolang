<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->text('address');
          $table->string('category');
          $table->string('region');
          $table->string('price');
          $table->longtext('description');
          $table->string('image');
          $table->string('panorama');
          $table->string('longitude')->nullable();
          $table->string('latitude')->nullable();
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
        Schema::dropIfExists('tours');
    }
}
