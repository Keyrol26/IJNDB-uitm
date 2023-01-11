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
        if (!Schema::hasTable('bills')) {
            Schema::create('bills', function (Blueprint $table) {
                $table->integer('patient_id')->unsigned();
                $table->integer('episode_id')->unsigned();
                $table->increments('id')->unsigned();
                $table->string('payor', 255)->nullable();
                $table->string('payor_office', 255)->nullable();
                $table->string('payor_type', 255)->nullable();
                $table->string('bill_number', 255)->nullable();
                $table->string('bill_date', 255)->nullable();
                $table->decimal('bill_amount', 13, 2)->nullable();
                $table->decimal('deposit_amount', 13, 2)->nullable();
                $table->decimal('payment_amount', 13, 2)->nullable();
                $table->string('letter', 255)->nullable();
            });
        }
        Schema::table('bills', function (Blueprint $table) {
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
        Schema::dropIfExists('bills');
    }
};
