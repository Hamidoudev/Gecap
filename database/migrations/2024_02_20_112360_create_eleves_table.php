<?php

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
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('classe_id')->unsigned();
            $table->string('matricule')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_n');
            $table->string('adresse')->nullable();
            $table->enum('genre', ['F', 'M']);
            $table->binary('acte_n')->nullable();
            $table->foreignId('ecole_id')->constrained('ecoles')->onDelete('cascade');

            $table->timestamps();
        });

          // Génération du matricule
    DB::unprepared('
    CREATE TRIGGER generate_matricule BEFORE INSERT ON eleves
    FOR EACH ROW
    BEGIN
        DECLARE next_matricule INT;
        SELECT IFNULL(MAX(CAST(SUBSTRING(matricule, 2) AS UNSIGNED)), 0) + 1 INTO next_matricule FROM eleves;
        SET NEW.matricule = CONCAT("E", LPAD(next_matricule, 3, "0"));
    END
');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleves');
    }
};
