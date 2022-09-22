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
        Schema::create('peminjam_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam');
            $table->foreignId('stok_id');
            $table->string('keperluan');
            $table->date('tanggal_pinjam');
            $table->timestamps();
        });
        Schema::table('peminjam_barangs', function (Blueprint $table) {
            $table->foreign('stok_id')->references('id')->on('stoks')->ondelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjam_barangs');
    }
};
