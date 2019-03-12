<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservationView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        \DB::statement("
        CREATE VIEW observation_views
        AS
        SELECT
        observations.id AS 'id',
        group_views.user_id AS 'user_id',
        group_views.program_id AS 'program_id',
        /*groups_program.program_name AS 'program_name',*/
        observations.group_id AS 'group_id',
        group_views.name AS 'group_name',
        observations.howSensed AS 'howSensed',
        observations.animalPosition AS 'whereSensed',
        observations.animalAction AS 'action',
        observations.animalPosition AS 'position', 
        concat(observations.plantKind, observations.animalGroup) AS 'type',
        concat(ifnull(if(length(observations.grasskind),observations.grassKind, NULL), observations.plantKind), ifnull(if(length(observations.animalSubtype), observations.animalSubType, NULL), observations.animalType)) AS 'species',
        observations.howManySeen AS 'howManySeen',
        observations.location_id AS 'location_id',
        locations.name AS 'location_name',
        locations.longitude AS 'longitude',
        locations.latitude AS 'latitude',
        observations.photoLocation AS 'photo'
        FROM
        observations
        JOIN `group_views` ON observations.group_id = group_views.id
        JOIN `locations` ON observations.location_id = locations.id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
