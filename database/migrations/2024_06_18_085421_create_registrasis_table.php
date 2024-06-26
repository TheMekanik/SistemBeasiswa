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
        Schema::create('registrasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beasiswa_id')->constrained('beasiswa')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('nama_beasiswa');
            $table->string('nim_mhs');
            $table->foreign('nim_mhs')->references('nim')->on('mahasiswa')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('status')->default('pending'); 
            $table->string('nama_mhs')->nullable();   
            $table->string('image_cv')->nullable(); 
            $table->string('image_transkrip');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registrasi');
    }
};
