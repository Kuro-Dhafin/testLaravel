<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $t) {
            $t->id();
            $t->foreignId('buyer_id')->constrained('users')->onDelete('cascade');
            $t->foreignId('service_id')->constrained()->onDelete('cascade');
            $t->integer('quantity');
            $t->integer('total_price');
            $t->enum('status', ['pending','paid','cancelled'])->default('pending');
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
