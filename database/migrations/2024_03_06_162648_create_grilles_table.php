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
        Schema::create('grilles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->enum('statut', ['active', 'non-active'])->default('active');
            $table->bigInteger('ecole_id')->unsigned();
            $table->string('classe_tenue');
            $table->string('discipline');
            $table->string('theme');
            $table->string('duree');          
            $table->integer('effectif');
            $table->integer('F');
            $table->integer('G');
            $table->integer('fiche_preparation')->nullable();
            $table->integer('materiel_didactique')->nullable();
            $table->integer('utilisation_materiel')->nullable();
            $table->integer('opo_annonces')->nullable();
            $table->integer('methode_pertinente')->nullable();
            $table->integer('eleves_activite')->nullable();
            $table->integer('contenu_conforme')->nullable();
            $table->integer('contenu_maitrise')->nullable();
            $table->integer('techniques_animation')->nullable();
            $table->integer('exercices_evaluation')->nullable();
            $table->integer('total_points')->nullable();
            $table->string('conseille1');
            $table->string('conseille2');
            $table->string('conseille3');
            $table->string('conseille4');
            $table->string('conseille5');
            $table->date('date');
            $table->timestamps();
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grilles');
    }
};
