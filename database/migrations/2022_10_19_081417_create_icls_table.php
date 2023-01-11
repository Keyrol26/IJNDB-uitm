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
        if (!Schema::hasTable('icls')) {
            Schema::create('icls', function (Blueprint $table) {
                $table->integer('patient_id')->unsigned();
                $table->integer('episode_id')->unsigned();
                $table->increments('id')->unsigned();
                $table->string('scheduled_date', 255)->nullable();
                $table->string('procedure_date', 255)->nullable();
                $table->string('status', 255)->nullable();
                $table->integer('waiting_days')->nullable();
                $table->string('consultant', 255)->nullable();
                $table->string('clinical_specialist', 255)->nullable();
                $table->string('operator_1', 255)->nullable();
                $table->string('operator_2', 255)->nullable();
                $table->string('diagnosis', 255)->nullable();
                $table->string('anaesthesia_status', 255)->nullable();
                $table->string('consent', 255)->nullable();
                $table->string('financial_status', 255)->nullable();
                $table->string('investigation', 255)->nullable();
                $table->string('initial_assessment', 255)->nullable();
                $table->time('fasting_time')->nullable();
                $table->string('breakfast', 255)->nullable();
                $table->string('lunck', 255)->nullable();
                $table->time('estimated_time_call')->nullable();
                $table->string('cath_registration', 255)->nullable();
                $table->string('initial_procedure', 255)->nullable();
                $table->string('1st_final_proc', 255)->nullable();
                $table->string('2nd_final_proc', 255)->nullable();
                $table->string('3rd_final_proc', 255)->nullable();
                $table->string('lab', 255)->nullable();
                $table->time('time_in')->nullable();
                $table->time('time_out')->nullable();
                $table->string('morbidity', 255)->nullable();
                $table->string('morbidity_remarks', 255)->nullable();
                $table->string('dtbt', 255)->nullable();
                $table->string('dtbt_remarks', 255)->nullable();
                $table->string('vascular', 255)->nullable();
                $table->string('vascular_remarks', 255)->nullable();
                $table->string('overall_remarks', 255)->nullable();
            });
        }
        Schema::table('icls', function (Blueprint $table) {
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
        Schema::dropIfExists('icls');
    }
};
