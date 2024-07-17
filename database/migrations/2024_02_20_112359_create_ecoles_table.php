<?php

use App\Models\Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ecoles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('typeecole_id')->constrained('typeecoles')->onDelete('cascade');
            $table->string('nom');
            $table->string('siege');
            $table->string('email');
            $table->string('password');
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade');
            $table->timestamps();
        });
          // Ajouter la contrainte de vérification pour MySQL 8.0.16 et plus
          DB::statement('ALTER TABLE ecoles ADD CONSTRAINT password_min_length CHECK (CHAR_LENGTH(password) >= 8)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecoles');
        DB::statement('ALTER TABLE ecoles DROP CONSTRAINT password_min_length');
    
    }
};
