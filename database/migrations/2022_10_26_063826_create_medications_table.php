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
        if (!Schema::hasTable('medications')) {
            Schema::create('medications', function (Blueprint $table) {
                $table->integer('patient_id')->unsigned();
                $table->integer('episode_id')->unsigned();
                $table->integer('oeord_rowid')->unsigned();
                $table->integer('oeori_rowid')->unsigned();
                $table->string('order_item_code')->nullable();
                $table->string('order_item_decs')->nullable();
                $table->string('order_status')->nullable();
                $table->string('order_priority')->nullable();
                $table->string('order_date')->nullable();
                $table->time('order_time')->nullable();
                $table->string('dose_qtt', 255)->nullable();
                $table->string('uom', 255)->nullable();
                $table->string('frequency', 255)->nullable();
                $table->string('duration', 255)->nullable();
                $table->string('qtt', 255)->nullable();
                $table->string('receiving_location', 255)->nullable();
            });
        }
        Schema::table('medications', function (Blueprint $table) {
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
        Schema::dropIfExists('medications');
    }
};
