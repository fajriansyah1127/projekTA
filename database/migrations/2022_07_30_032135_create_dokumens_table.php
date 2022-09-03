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
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('produk_id');
            $table->foreignId('outlet_id');
            $table->string('nama');
            $table->string('nomor_akad');
            $table->date('tanggal_klaim');
            $table->string('file');
            $table->timestamps();
        });

        Schema::table('dokumens', function (Blueprint $table) {
            $table->foreign('produk_id')->references('id')->on('produks')->ondelete('restrict');
            $table->foreign('outlet_id')->references('id')->on('outlets')->ondelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->ondelete('noaction');
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
        Schema::dropIfExists('dokumens');
        Schema::table('dokumen', function (Blueprint $table) {
            $table->dropForeign(['asuransi_id']);
        });
    }
};

//Dokumen::create(['user_id' => '1','asuransi_id' => '2','nama' => 'Fajriansyah','nomor_surat' => '11181027','tanggal_surat' => 'hahahihi','file' => 'Sahah'])