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
        
Schema::create('laptops', function (Blueprint $table) {
    $table->id();
    $table->string('brand');
    $table->string('model');
    $table->string('serial_number')->unique();
    $table->decimal('daily_rate', 8, 2);
    $table->boolean('is_available')->default(true);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
