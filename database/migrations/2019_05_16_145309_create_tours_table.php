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
          $table->string('operational');
          $table->longtext('description');
          $table->string('image');
          $table->string('panorama1');
          $table->string('panorama2');
          $table->string('panorama3');
          $table->string('longitude');
          $table->string('latitude');
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
