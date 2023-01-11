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
        if (!Schema::hasTable('subsidydocs')) {
            Schema::create('subsidydocs', function (Blueprint $table) {
                $table->integer('patient_id')->unsigned();
                $table->increments('id')->unsigned();
                $table->string('document', 255);
                $table->string('tarikh', 255);
                $table->string('rujukan', 255);
                $table->string('negeri', 255);
            });
        }
        Schema::table('subsidydocs', function (Blueprint $table) {
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
        Schema::dropIfExists('subsidydocs');
    }
};
