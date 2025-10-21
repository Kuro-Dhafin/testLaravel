<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('price_references', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('level');
            $table->integer('min_price');
            $table->integer('max_price');
            $table->string('pricing_unit');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('price_references');
    }
};
