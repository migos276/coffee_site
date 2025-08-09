<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('practices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->string('icon')->nullable(); // icon class or image path
            $table->unsignedInteger('order')->default(0);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });

        Schema::create('lawyer_practice', function (Blueprint $table) {
            $table->foreignId('lawyer_id')->constrained()->cascadeOnDelete();
            $table->foreignId('practice_id')->constrained()->cascadeOnDelete();
            $table->primary(['lawyer_id', 'practice_id']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('lawyer_practice');
        Schema::dropIfExists('practices');
    }
};