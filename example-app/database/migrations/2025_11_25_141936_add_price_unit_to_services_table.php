<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::table('services', function (Blueprint $table) {
        $table->string('price_unit')->after('price')->default('per artwork');
    });
}

public function down(): void
{
    Schema::table('services', function (Blueprint $table) {
        $table->dropColumn('price_unit');
    });
}

};
