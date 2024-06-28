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
        Schema::create('enseignant_matiere', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matiere_id'); 
            $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade');
            $table->unsignedBigInteger('enseignant_id'); 
            $table->foreign('enseignant_id')->references('id')->on('enseignants')->onDelete('cascade');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseignant_matiere');
    }
};