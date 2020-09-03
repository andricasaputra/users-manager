<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPjColumnToWilkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wilkers', function (Blueprint $table) {
            $table->unsignedBigInteger('pj_id')->nullable()->after('nama_wilker');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wilkers', function (Blueprint $table) {
            $table->dropColumn('pj_id');
        });
    }
}
