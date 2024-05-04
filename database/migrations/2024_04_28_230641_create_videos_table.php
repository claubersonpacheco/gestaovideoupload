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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('file_path')->nullable();
            $table->string('name')->unique()->nullable();
            $table->string('guid')->nullable();
            $table->string('videoLibraryId')->nullable();
            $table->string('collection')->nullable();
            $table->string('description')->nullable();
            $table->string('type')->nullable();
            $table->string('thumbnail')->nullable();

            $table->unsignedBigInteger('folder_id');
            $table->foreign('folder_id')->references('id')->on('folders')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
