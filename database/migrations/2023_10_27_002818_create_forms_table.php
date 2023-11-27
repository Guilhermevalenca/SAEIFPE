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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('user_id')
                ->references('id')
                ->on('users');
            $table->unique(['title', 'user_id']);
            $table->boolean('visible')->default(1);
            //Utilizando referencia pra mesma tabela, para realizar a edição
            //Guardando respostas antigas para esse formulário
            $table->foreignId('forms_id')->nullable()
                ->references('id')
                ->on('forms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
