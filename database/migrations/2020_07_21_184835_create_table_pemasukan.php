<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePemasukan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->string('pemasukan_id', 40);
            $table->string('sumber_pemasukan');
            $table->integer('nominal');
            $table->dateTime('tanggal');
            $table->text('keterangan');

            $table->primary('pemasukan_id');
            $table->foreign('sumber_pemasukan')
                ->references('id')->on('sumber')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemasukan', function (Blueprint $table) {
            //
        });
    }
}
