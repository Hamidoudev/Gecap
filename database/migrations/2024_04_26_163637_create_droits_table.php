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
            $table->foreignId('type_droit_id')->constrained('type_droit')->onDelete('cascade');
            $table->timestamps();
        });

        DB::table('droits')->insert([
            [
                'nom' => 'administrative',
                'acces' => 1,
                'route' => 'emplois.listes',
                'type_droit_id' => 1,
                
                
            ],
            [
                'nom' => 'pedagogie',
                'acces' => 2,
                'route' => 'emplois.edit',
                'type_droit_id' => 2,
               
            ],
            [
                'nom' => 'ressource',
                'acces' => 1,
                'route' => 'emplois.delete',
                'type_droit_id' => 2,
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
