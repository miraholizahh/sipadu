<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dempster_shafer_knowledge_base', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dempster_shafer_id')->constrained('dempster_shafers')->onDelete('cascade');
            $table->foreignId('knowledge_base_id')->constrained('knowledge_bases')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dempster_shafer_knowledge_base');
    }
};
