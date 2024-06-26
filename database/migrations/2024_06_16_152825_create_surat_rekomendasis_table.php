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
        Schema::create('surat_rekomendasi', function (Blueprint $table) {
            $table->id();
            $table->string('nim_mhs');
            $table->foreign('nim_mhs')->references('nim')->on('mahasiswa')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('nama_mhs');
            $table->boolean('is_rekomendasi')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_rekomendasi');
    }
};
