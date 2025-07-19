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
        Schema::create('knowledge_bases', function (Blueprint $table) {
            $table->id();
            $table->float('bobot');
            $table->timestamps();
            $table->unsignedBigInteger('idSymptom');
            $table->foreign('idSymptom')->references('id')->on('symptoms')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('idDisease');
            $table->foreign('idDisease')->references('id')->on('diseases')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knowledge_bases');
    }
};
