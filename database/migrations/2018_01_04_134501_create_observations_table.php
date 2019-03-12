<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id');
            $table->text('howSensed');
            $table->text('whatSensed');
            $table->text('whereSensed');
            $table->text('plantKind');
            $table->text('grassKind');
            $table->text('howMuchPlant');
            $table->integer('howManySeen');
            $table->text('animalGroup');
            $table->text('animalType');
            $table->text('animalSubType');
            $table->text('note');
            $table->text('howManyIsExact');
            $table->text('photoLocation');
            $table->integer('location_id');
            $table->text('animalPosition');
            $table->text('animalAction');
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
        Schema::dropIfExists('observations');
    }
}
