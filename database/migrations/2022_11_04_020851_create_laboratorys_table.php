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
        if (!Schema::hasTable('laboratorys')) {
            Schema::create('laboratorys', function (Blueprint $table) {
                $table->integer('patient_id')->unsigned();
                $table->integer('episode_id')->unsigned();
                $table->integer('oeord_rowid')->unsigned();
                $table->integer('oeori_rowid')->unsigned();
                $table->string('lab_no1')->nullable();
                $table->string('order_item_code')->nullable();
                $table->string('order_item_decs')->nullable();
                $table->string('lab_no')->nullable();
                $table->string('lab_department')->nullable();
                $table->string('order_status')->nullable();
                $table->string('order_priority')->nullable();
                $table->string('order_date')->nullable();
                $table->time('order_time')->nullable();
                $table->string('collection_date', 255)->nullable();
                $table->time('collection_time')->nullable();
                $table->string('result_date', 255)->nullable();
                $table->time('result_time')->nullable();
                $table->string('specimens', 255)->nullable();
                $table->string('test_set', 255)->nullable();
                $table->string('test_item', 255)->nullable();
                $table->string('value', 255)->nullable();
                $table->string('unit', 255)->nullable();
                $table->string('ref_range', 255)->nullable();
            });
        }
        Schema::table('laboratorys', function (Blueprint $table) {
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
        Schema::dropIfExists('laboratorys');
    }
};
