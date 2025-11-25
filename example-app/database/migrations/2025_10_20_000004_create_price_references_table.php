<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('price_references', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id')->nullable(); // optional link to categories if you create it
            $table->string('level')->nullable(); // entry/mid/pro
            $table->bigInteger('price_min');
            $table->bigInteger('price_max');
            $table->string('pricing_unit')->nullable(); // per panel/per second/per artwork
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('price_references');
    }
};
