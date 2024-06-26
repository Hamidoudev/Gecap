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
        Schema::create('droits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->boolean('acces');
            $table->string('route', 50);
            $table->foreignId('type_droit_id')->constrained('type_droits')->onDelete('cascade');
            $table->timestamps();
        });

        DB::table('droits')->insert([
            [
                'nom' => 'Emplois',
                'acces' => 1,
                'route' => 'emplois.listes',
                'type_droit_id' => 1,
                
                
            ],
            [
                'nom' => 'Utilisateurs',
                'acces' => 1,
                'route' => 'users.index',
                'type_droit_id' => 4,
                
                
            ],
            [
                'nom' => 'Enseignants',
                'acces' => 1,
                'route' => 'enseignants.listes',
                'type_droit_id' => 1,
               
            ],
            [
                'nom' => 'Eleves',
                'acces' => 1,
                'route' => 'eleves.listes',
                'type_droit_id' => 1,
            ],
            [
                'nom' => 'Equipements',
                'acces' => 1,
                'route' => 'equipements.listes',
                'type_droit_id' => 3,
            ],
            [
                'nom' => 'Personnels',
                'acces' => 1,
                'route' => 'personnels.listes',
                'type_droit_id' => 1,
            ],
            [
                'nom' => 'Programmes',
                'acces' => 1,
                'route' => 'programmes.listes',
                'type_droit_id' => 2,
            ],
            [
                'nom' => 'Ecoles',
                'acces' => 1,
                'route' => 'ecoles.listes',
                'type_droit_id' => 2,
            ],
            [
                'nom' => 'Grilles',
                'acces' => 1,
                'route' => 'grilles.listes',
                'type_droit_id' => 2,
            ],
            [
                'nom' => 'Droits',
                'acces' => 1,
                'route' => 'droits.index',
                'type_droit_id' => 4,
            ],
            [
                'nom' => 'Role',
                'acces' => 1,
                'route' => 'roles.index',
                'type_droit_id' => 4,
            ],
            [
                'nom' => 'Matieres',
                'acces' => 1,
                'route' => 'matieres.listes',
                'type_droit_id' => 2,
            ],
            [
                'nom' => 'Examen',
                'acces' => 1,
                'route' => 'examens.listes',
                'type_droit_id' => 2,
            ],
            [
                'nom' => 'Evaluation',
                'acces' => 1,
                'route' => 'evaluation.listes',
                'type_droit_id' => 1,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('droits');
    }
};
