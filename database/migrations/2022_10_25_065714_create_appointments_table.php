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
        if (!Schema::hasTable('appointments')) {
            Schema::create('appointments', function (Blueprint $table) {
                $table->integer('patient_id')->unsigned();
                $table->integer('episode_id')->unsigned();
                $table->integer('res_rowid')->unsigned();
                $table->increments('id')->unsigned();
                $table->integer('appt_rowid')->unsigned();
                $table->string('appointment_date', 255)->nullable();
                $table->time('appointment_time')->nullable();
                $table->string('appointment_status', 255)->nullable();
                $table->string('resource_location', 255)->nullable();
                $table->string('resource', 255)->nullable();
                $table->string('service', 255)->nullable();
               
            });
        }
        Schema::table('appointments', function (Blueprint $table) {
            $table->foreign('patient_id')
                ->references('id')->on('patients')
                ->onDelete('cascade');

            $table->foreign('episode_id')
                ->references('id')->on('episodes')
                ->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
};
