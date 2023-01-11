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
        if (!Schema::hasTable('elabs')) {
            Schema::create('elabs', function (Blueprint $table) {
                $table->integer('patient_id')->unsigned();
                $table->integer('episode_id')->unsigned();
                $table->increments('id')->unsigned();
                $table->tinyInteger('fasting')->nullable();
                $table->string('expected_appointment')->nullable();
                $table->tinyInteger('rp')->nullable();
                $table->tinyInteger('lft')->nullable();
                $table->tinyInteger('fsl')->nullable();
                $table->tinyInteger('fbs_rbs')->nullable();
                $table->tinyInteger('fbc')->nullable();
                $table->tinyInteger('hba1c')->nullable();
                $table->tinyInteger('inr')->nullable();
                $table->tinyInteger('ufeme')->nullable();
                $table->tinyInteger('tft')->nullable();
                $table->tinyInteger('ft3')->nullable();
                $table->tinyInteger('sero')->nullable();
                $table->tinyInteger('hscrp')->nullable();
                $table->tinyInteger('cardiac_marker');
                $table->tinyInteger('mircroalbumin')->nullable();
                $table->tinyInteger('probnp')->nullable();
                $table->tinyInteger('iron_studies')->nullable();
                $table->tinyInteger('vit_b12')->nullable();
                $table->tinyInteger('cea')->nullable();
                $table->tinyInteger('psa')->nullable();
                $table->tinyInteger('afp')->nullable();
                $table->tinyInteger('ca125')->nullable();
                $table->string('other')->nullable();
                $table->string('other1')->nullable();
                $table->tinyInteger('fasting_1')->nullable();
                $table->string('expected_appointment_1')->nullable();
                $table->tinyInteger('rp_1')->nullable();
                $table->tinyInteger('lft_1')->nullable();
                $table->tinyInteger('fsl_1')->nullable();
                $table->tinyInteger('fbs_rbs_1')->nullable();
                $table->tinyInteger('fbc_1')->nullable();
                $table->tinyInteger('hba1c_1')->nullable();
                $table->tinyInteger('inr_1')->nullable();
                $table->tinyInteger('ufeme_1')->nullable();
                $table->tinyInteger('tft_1')->nullable();
                $table->tinyInteger('ft3_1')->nullable();
                $table->tinyInteger('sero_1')->nullable();
                $table->tinyInteger('hscrp_1')->nullable();
                $table->tinyInteger('cardiac_marker_1')->nullable();
                $table->tinyInteger('mircroalbumin_1')->nullable();
                $table->tinyInteger('probnp_1')->nullable();
                $table->tinyInteger('iron_studies_1')->nullable();
                $table->tinyInteger('vit_b12_1')->nullable();
                $table->tinyInteger('cea_1')->nullable();
                $table->tinyInteger('psa_1')->nullable();
                $table->tinyInteger('afp_1')->nullable();
                $table->tinyInteger('ca125_1')->nullable();
                $table->string('other2', 255)->nullable();
                $table->string('other3', 255)->nullable();
                $table->string('req_doctor', 255)->nullable();
                $table->string('creation_date', 255)->nullable();
                $table->time('creation_time')->nullable();
                $table->string('creation_user', 255)->nullable();
                $table->string('last_update_date', 255)->nullable();
                $table->time('last_update_time')->nullable();
                $table->string('last_update_user', 255)->nullable();
            });
        }
        Schema::table('elabs', function (Blueprint $table) {
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
        Schema::dropIfExists('elabs');
    }
};
