<?php

use App\Models\trimestre;
use App\Models\Ue;
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
        Schema::create('emplois', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('classe_id')->unsigned();
            $table->bigInteger('enseignant_id')->unsigned();
            $table->bigInteger('ecole_id')->unsigned();
            $table->bigInteger('matiere_id')->unsigned();
            $table->bigInteger('cycle_id')->unsigned();
            $table->enum('jour', ['lundi', ' mardi', 'mercredi','jeudi', 'vendredi']);
            $table->time('heure', ['7h:45-10h:00', '7h:45-8h:45', '8h:45-9h:45', '10h:00-12h:00', '12h:00-13h:00', '13h:00-14h:00', '14h:00-15h:00', '15h:00-16h:00', '16h:00-17h:00', '17h:00-18h:00','15h:00-17h:00']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emplois');
    }
};
