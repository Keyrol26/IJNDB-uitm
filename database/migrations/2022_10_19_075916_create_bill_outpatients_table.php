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
        Schema::create('billOutpatients', function (Blueprint $table) {
            $table->string('mrn');
            $table->string('name', 255);
            $table->string('episode_no', 255);
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billOutpatients');
    }
};
