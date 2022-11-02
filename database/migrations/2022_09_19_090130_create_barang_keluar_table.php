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
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stok_id');
            $table->string('nama');
            $table->string('jenis');
            $table->integer('total_barangkeluar');
            $table->string('satuan');
            $table->string('pengambil');
            $table->string('foto');
            $table->date('tanggal_keluar');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('barang_keluar', function (Blueprint $table) {
            $table->foreign('stok_id')->references('id')->on('stoks')->ondelete('cascade')->onUpdate('cascade');
            // $table->foreign('produk_id')->references('id')->on('asuransis')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_keluar');
    }
};
