<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('artist_details', function(Blueprint $table){
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('status',['open_commissions','closed'])->default('open_commissions');
            $table->bigInteger('min_price')->nullable();
            $table->bigInteger('max_price')->nullable();
            $table->string('portfolio_link')->nullable();
            $table->timestamps();
        });
    }
    public function down(){ Schema::dropIfExists('artist_details'); }
};
