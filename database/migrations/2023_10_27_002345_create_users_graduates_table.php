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
        Schema::create('users_graduates', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->boolean('phoneIsWhatsApp')->default(false);
            $table->string('genre')->nullable();

            $listCourses = ['ADM', 'IPI', 'LOG', 'TGQ', 'TSI'];
            $table->enum('course', $listCourses);

            $table->foreignId('users_id')
                ->references('id')
                ->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_graduates');
    }
};
