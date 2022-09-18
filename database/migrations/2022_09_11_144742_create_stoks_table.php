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
        Schema::create('stoks', function (Blueprint $table) {
            $table->string('id',32)->primarykey();
            $table->string('nama_barang');
            $table->string('jenis_barang');
            $table->integer('jumlah');
            $table->foreignId('satuan_id');
            $table->timestamps();
        });

        Schema::table('stoks', function (Blueprint $table) {
            $table->foreign('satuan_id')->references('id')->on('satuans')->ondelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stoks');
    }
};
