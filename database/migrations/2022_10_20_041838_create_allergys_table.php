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
        if (!Schema::hasTable('allergys')) {
            Schema::create('allergys', function (Blueprint $table) {
                $table->integer('patient_id')->unsigned();
                $table->integer('id')->unsigned();
                $table->string('update_date', 255)->nullable();
                $table->string('allergen', 255)->nullable();
                $table->string('allergen_text', 255)->nullable();
            });
        }
        Schema::table('allergys', function (Blueprint $table) {
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
        Schema::dropIfExists('allergys');
    }
};
