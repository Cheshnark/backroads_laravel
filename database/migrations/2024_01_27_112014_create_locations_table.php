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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('user_id');
            $table->string('coordinates');
            $table->string('title');
            $table->string('body')->nullable();
            $table->string('location_type');
            $table->string('address');
            $table->array_chunk('services')->nullable();
            $table->float('price')->nullable();
            $table->string('opeing_hours')->nullable();
            $table->float('score')->nullable();
            $table->array('comments')->nullable();
            $table->array('images')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
