<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('profiles', function(Blueprint $table){
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('bio')->nullable();
            $table->string('skills')->nullable();
            $table->string('location')->nullable();
            $table->string('website')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamps();
        });
    }
    public function down(){ Schema::dropIfExists('profiles'); }
};
