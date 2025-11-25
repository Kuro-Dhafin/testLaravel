<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('services', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained()->onDelete('cascade');
            $t->string('title');
            $t->text('description')->nullable();
            $t->integer('price');
            $t->string('category'); 
            $t->string('image')->nullable(); 
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
