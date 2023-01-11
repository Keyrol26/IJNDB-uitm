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
        if (!Schema::hasTable('subsidys')) {
            Schema::create('subsidys', function (Blueprint $table) {
                $table->integer('patient_id')->unsigned();
                $table->increments('id')->unsigned();
                $table->string('nama_keluarga', 255);
                $table->string('ic_keluarga', 255);
                $table->string('hubungan_keluarga', 255);
                $table->string('alamat_keluarga', 255);
                $table->string('homeno_keluarga', 255);
                $table->string('phoneno_keluarga', 255);
                $table->string('officeno_keluarga', 255);
                $table->string('nama_temuduga', 255);
                $table->string('ic_temuduga', 255);
                $table->string('hubungan_temuduga', 255);
                $table->string('alamat_temuduga', 255);
                $table->string('homeno_temuduga', 255);
                $table->string('officeno_temuduga', 255);
                $table->string('pekerjaan_temuduga', 255);
                $table->string('sebab', 255);
                $table->string('sebab_lain', 255);
                $table->string('summary', 255);
                $table->string('status_kediaman', 255);
                $table->string('jenis_rumah', 255);
                $table->string('kemudahan_asas', 255);
                $table->string('prosedur', 255);
                $table->string('kos_anggaran', 255);
                $table->string('mampu_dibayar', 255);
                $table->string('taksiran_tarikh', 255);
                $table->string('surat_pesakit', 255);
                $table->string('surat_semakan', 255);
            });
        }
        Schema::table('subsidys', function (Blueprint $table) {
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
        Schema::dropIfExists('subsidys');
    }
};
