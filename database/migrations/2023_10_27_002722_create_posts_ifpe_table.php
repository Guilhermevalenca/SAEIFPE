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
        Schema::create('posts_ifpe', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->json('send_to');
            $table->foreignId('user_id')
                ->references('id')
                ->on('users');
            $table->boolean('visible')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_ifpe');
    }
};
