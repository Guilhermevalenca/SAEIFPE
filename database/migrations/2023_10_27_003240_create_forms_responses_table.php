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
        Schema::create('forms_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')
                ->references('id')
                ->on('users');
            $table->foreignId('forms_id')
                ->references('id')
                ->on('forms');
            $table->foreignId('questions_id')
                ->references('id')
                ->on('forms_questions');
            $table->json('selected_responses')->nullable();
            $table->string('open_ended_responses')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms_responses');
    }
};
