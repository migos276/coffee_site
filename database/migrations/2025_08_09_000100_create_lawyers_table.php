<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('lawyers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('title')->nullable();
            $table->longText('bio')->nullable();
            $table->string('photo')->nullable(); // path
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->json('education')->nullable(); // array of entries
            $table->json('experience')->nullable();
            $table->json('languages')->nullable(); // ['fr','en',...]
            $table->boolean('status')->default(true); // actif / inactif
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('lawyers');
    }
};