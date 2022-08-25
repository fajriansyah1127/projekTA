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
            $table->string('nama');
            $table->string('nomor_surat');
            $table->date('tanggal_surat');
            $table->string('file');
            $table->timestamps();
        });

        Schema::table('dokumens', function (Blueprint $table) {
            $table->foreign('produk_id')->references('id')->on('produk')->ondelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->ondelete('restrict');
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