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
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('forms_id')
                ->references('id')
                ->on('forms');
            $table->foreignId('questions_id')
                ->references('id')
                ->on('questions');
            $table->foreignId('users_id')
                ->references('id')
                ->on('users');
            $table->foreignId('options_id')
                ->references('id')
                ->on('options');
            $table->json('selected_responses')->nullable();
            $table->string('open-ended_responses')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};
