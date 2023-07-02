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
        Schema::create('list_post', function (Blueprint $table) {
            $table->unsignedBigInteger('list_id');
            $table->unsignedBigInteger('post_id');
            $table->timestamps();

            $table->foreign('list_id')->references('id')->on('user_lists')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_post');
    }
};
