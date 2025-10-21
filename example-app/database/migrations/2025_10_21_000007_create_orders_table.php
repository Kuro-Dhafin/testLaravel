<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('service_id');
            $table->integer('quantity')->default(1);
            $table->integer('total_price');
            $table->enum('status', ['pending','accepted','completed'])->default('pending');
            $table->timestamps();

            $table->foreign('buyer_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('service_id')
                  ->references('id')
                  ->on('services')
                  ->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
