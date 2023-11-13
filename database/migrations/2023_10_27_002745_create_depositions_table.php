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
        Schema::create('depositions', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->string('picture')->nullable();
            $table->timestamps();
            $table->foreignId('user_id')->unique()->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('depositions');

    }
};
