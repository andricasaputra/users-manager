<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGolonganIdToMasterPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_pegawais', function (Blueprint $table) {
            $table->unsignedBigInteger('golongan_id')->nullable()->after('user_id');

            $table->foreign('golongan_id')->references('id')->on('golongans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_pegawais', function (Blueprint $table) {
            $table->dropColumn('golongan_id');
        });
    }
}
