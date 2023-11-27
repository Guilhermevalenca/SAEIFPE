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
        Schema::create('forms_questions', function (Blueprint $table) {
            $table->id();
            $table->string('ask');
            $table->enum('type',['open-ended', 'unique', 'multiple']);
            $table->foreignId('form_id')
                ->references('id')
                ->on('forms')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms_questions');
    }
};
