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
        if (!Schema::hasTable('ots')) {
            Schema::create('ots', function (Blueprint $table) {
                $table->integer('patient_id')->unsigned();
                $table->integer('episode_id')->unsigned();
                $table->increments('id')->unsigned();
                $table->string('op_date', 255)->nullable();
                $table->string('status', 255)->nullable();
                $table->string('operating_theatre', 255)->nullable();
                $table->string('op_code', 255)->nullable();
                $table->string('op_type', 255)->nullable();
                $table->string('diagnosis', 255)->nullable();
                $table->string('surgeon', 255)->nullable();
                $table->string('remarks', 255)->nullable();
                $table->string('remarks_1', 255)->nullable();
                $table->string('cancel_reason', 255)->nullable();
                $table->string('anaestheatist', 255)->nullable();
                $table->string('referral_date', 255)->nullable();
                $table->string('waiting_list', 255)->nullable();
            });
        }
        Schema::table('ots', function (Blueprint $table) {
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
        Schema::dropIfExists('ots');
    }
};
