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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->longtext('description');
            $table->double('price');
            $table->string('time');
            $table->enum('status',['open','closed'])->default('open');
            // foreign ids
            $table->foreignId('user_id')->constrained()->onDelete('cascade');;
            $table->foreignId('category_id')->constrained()->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
