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
        Schema::create('dempster_shafers', function (Blueprint $table) {
            $table->id();
            $table->float('belief');
            $table->float('plausibility');
            $table->unsignedBigInteger('idBasisPengetahuan');
            $table->timestamps();
            $table->foreign('idBasisPengetahuan')->references('id')->on('knowledge_bases')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dempster_shafers');
    }
};
