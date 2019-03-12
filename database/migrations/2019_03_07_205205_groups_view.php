<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GroupsView extends Migration
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
            CREATE VIEW group_views
            AS
            SELECT
            groups.id AS 'id',
            groups.name AS 'name',
            groups.user_id AS 'user_id',
            users.program_id AS 'program_id'
            FROM
            biokidsprod.groups
            JOIN `users` ON groups.user_id = users.id;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_views');
    }
}
