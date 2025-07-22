<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('diagnosis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_diagnosa');
            $table->float('hasil_diagnosa');
            $table->timestamps();
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('idDisease')->nullable();
            $table->foreign('idDisease')->references('id')->on('diseases')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('idDempsterShafer')->nullable();
            $table->foreign('idDempsterShafer')->references('id')->on('dempster_shafers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosis');
    }
};