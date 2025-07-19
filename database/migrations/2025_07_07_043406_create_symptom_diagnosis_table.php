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
        Schema::create('symptom_diagnosis', function (Blueprint $table) {
            $table->unsignedBigInteger('idDiagnosis');
            $table->foreign('idDiagnosis')->references('id')->on('diagnosis')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('idSymptom');
            $table->foreign('idSymptom')->references('id')->on('symptoms')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('symptom_diagnosis');
    }
};
