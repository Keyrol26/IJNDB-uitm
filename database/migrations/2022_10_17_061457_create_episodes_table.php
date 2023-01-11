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
        if (!Schema::hasTable('episodes')) {
            Schema::create('episodes', function (Blueprint $table) {
                $table->integer('paperrowID')->unsigned();
                $table->increments('id')->unsigned();
                $table->string('episode_no', 255);
                $table->string('episode_type', 255);
                $table->string('episode_status', 255);
                $table->date('episode_date');
                $table->time('episode_time');
                $table->string('department', 255);
                $table->string('doctor', 255);
                $table->string('ward', 255);
                $table->string('bed', 255);
                $table->string('subtype', 255);
                $table->string('visitType', 255);
                $table->string('discipline', 255);
                $table->string('admissioncategory', 255);
                $table->string('gl_type', 255);
                $table->date('dischargedate');
                $table->time('dischargetime');
                $table->string('provosionaldiagnosis', 255);
                $table->string('medicallocation', 255);
                $table->date('estdischargedate');
                $table->time('estdischargetime');
                $table->decimal('height');
                $table->decimal('weight');
                $table->string('referralhospital', 255);
                $table->string('referralsource', 255);
                $table->timestamps();
            });
        }
        Schema::table('episodes', function (Blueprint $table) {
            $table->foreign('paperrowid')
                ->references('id')->on('patients')
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
        Schema::dropIfExists('episodes');
    }
};
