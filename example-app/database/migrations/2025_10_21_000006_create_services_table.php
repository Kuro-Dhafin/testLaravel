<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('artist_id');
            $table->string('title');
            $table->text('description');
            $table->string('category');
            $table->integer('price');
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('artist_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

