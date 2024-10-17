<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cat_id')
                        ->constrained('categoria')
                        ->onDelete('cascade');
            $table->string('prod_nome');
            $table->integer('prod_quantidade');
            $table->text('prod_descricao')->nullable();
            $table->boolean('prod_ativo')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
