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
       Schema::create('tours', function (Blueprint $table) {
    $table->id();
    $table->foreignId('destination_id')->constrained()->cascadeOnDelete();
    $table->foreignId('trip_type_id')->constrained()->cascadeOnDelete();
    $table->string('trip_number');
    $table->decimal('price', 10, 2);
    $table->text('description')->nullable();
    $table->string('image')->nullable();
    $table->integer('trip_duration')->nullable();
    $table->float('rating')->default(0);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
