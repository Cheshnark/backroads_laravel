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
        Schema::create('profiles', function (Blueprint $table) {
            $table->uuid('id')->uuid()->primary()->nullable();
            $table->timestamps();
            $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->string('name');
            $table->string('email')->references('email')->on('users');
            $table->string('profile_img')->nullable();
            $table->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
