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
        if (!Schema::hasTable('patients')) {
            Schema::create('patients', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->string('hospital', 255);
                $table->integer('mrn')->unsigned();
                $table->integer('mrnp')->unsigned();
                $table->string('name', 255);
                $table->string('tittle', 255)->nullable();
                $table->string('sex', 255);
                $table->boolean('pdpa');
                $table->boolean('pchc')->nullable();
                $table->date('dob');
                $table->string('newic', 30)->nullable();
                $table->string('oldic', 30)->nullable();
                $table->string('passportno', 30)->nullable();
                $table->string('maritalstatus', 50)->nullable();
                $table->string('race', 20);
                $table->string('citizenship', 30)->nullable();
                $table->string('residential', 30)->nullable();
                $table->string('language', 50)->nullable();
                $table->string('religion', 30);
                $table->string('occupation', 50)->nullable();
                $table->string('mrntype', 50)->nullable();
                $table->string('bluelistflag', 255)->nullable();
                $table->string('address', 255);
                $table->string('postcode', 20);
                $table->string('city', 255);
                $table->string('state', 50);
                $table->string('country', 50)->nullable();
                $table->string('homeno', 20)->nullable();
                $table->string('phoneno', 20)->nullable();
                $table->string('email', 50)->unique()->nullable();
                $table->string('fax', 50)->nullable();
                $table->string('medrecordlocation', 255);
                $table->boolean('deceased');
                $table->date('deceaseddate')->nullable();
                $table->boolean('pmrmrndispose');
                $table->timestamps();
            });
        }
        Schema::table('patients', function (Blueprint $table) {
            $table->foreign('hospital')
                ->references('hospital')->on('hospitals')
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
        Schema::dropIfExists('patients');
    }
};
