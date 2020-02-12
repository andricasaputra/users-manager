<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_pegawais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('nama')->nullable();
            $table->string('nip', 20)->unique()->nullable();
            $table->string('ttl')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('tmt_jabatan')->nullable();
            $table->string('unit_kerja')->nullable();
            $table->string('gol_capeg')->nullable();
            $table->string('tmt_capeg')->nullable();
            $table->string('gol_akhir')->nullable();
            $table->string('tmt_akhir')->nullable();
            $table->string('nama_fungsional')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->index(['nip']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_pegawais');
    }
}
