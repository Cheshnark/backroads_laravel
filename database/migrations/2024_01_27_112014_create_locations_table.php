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
            $table->uuid('id')->uuid()->primary()->nullable();
            $table->timestamps();
            $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->json('coordinates')->nullable();
            $table->string('title');
            $table->string('body')->nullable();
            $table->string('location_type')->nullable();
            $table->string('address')->nullable();
            $table->json('services')->nullable();
            $table->double('price')->nullable();
            $table->string('opening_hours')->nullable();
            $table->float('score')->nullable();
            $table->json('comments')->nullable();
            $table->json('images')->nullable();
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
