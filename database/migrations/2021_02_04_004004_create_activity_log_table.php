<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); //who reported
            $table->integer("activityof_id");
            $table->string("activityof_type");
            $table->string('type'); //status,access,data
            $table->string('user')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->index(['activityof_id', 'activityof_type'], 'ix_activity_logs_activityof_id_activityof_type_index');
            //$table->foreign('user_id','fk_activity_logs_users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activity_logs', function (Blueprint $table) {
            $table->dropIndex('ix_activity_logs_activityof_id_activityof_type_index');
            //$table->dropForeign('fk_activity_logs_users_id');
        });

        Schema::dropIfExists('activity_logs');
    }
}
