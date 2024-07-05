<?php

use App\Models\Emplois;
use App\Models\Matiere;
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
        Schema::create('emplois_matieres', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Emplois::class)->constrained();
            $table->foreignIdFor(Matiere::class)->constrained();
            $table->string('jour');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emplois_matieres');
    }
};
