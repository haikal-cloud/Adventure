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
        Schema::create('hotspots', function (Blueprint $table) {
            $table->id();
            $table->integer('pitch');
            $table->integer('yaw');
            $table->string('type');
            $table->foreignId('scene_id')->references('id')->on('scenes')->cascadeOnDelete();
            $table->foreignId('change_scene_id')->nullable()->references('id')->on('scenes')->cascadeOnDelete();
            $table->text('text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotspots');
    }
};
