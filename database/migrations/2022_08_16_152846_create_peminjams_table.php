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
        Schema::create('peminjams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dokumen_id');
            $table->string('nama');
            $table->date('tanggal');
            $table->timestamps();
            $table->softDeletes();
            
        });

        Schema::table('peminjams', function (Blueprint $table) {
            $table->foreign('dokumen_id')->references('id')->on('dokumens')->ondelete('setnull');
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
        Schema::dropIfExists('peminjam');
    }
};
