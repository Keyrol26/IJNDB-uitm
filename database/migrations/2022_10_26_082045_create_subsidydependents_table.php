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
        if (!Schema::hasTable('subsidydependents')) {
            Schema::create('subsidydependents', function (Blueprint $table) {
                $table->integer('patient_id')->unsigned();
                $table->increments('id')->unsigned();
                $table->string('name', 255);
                $table->string('umur', 255);
                $table->string('perhubungan', 255);
                $table->string('pekerjaan', 255);
                $table->string('catatan', 255);
    
            });
        }
        Schema::table('subsidydependents', function (Blueprint $table) {
            $table->foreign('patient_id')
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
        Schema::dropIfExists('subsidydependents');
    }
};
