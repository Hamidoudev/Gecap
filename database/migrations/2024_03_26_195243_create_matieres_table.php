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
        Schema::create('matieres', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->enum('type', ['premier cycle', 'second cycle']);
            $table->bigInteger('enseignant_id')->unsigned();
            $table->timestamps();
        });
        DB::table('matieres')->insert([
            [
               
                'libelle' => 'science naturelles',
                'enseignant_id' => 1,
                'type'=> 'premier cycle',
               
                
                
            ],
            [
               
                'libelle' => 'mathématiques',
                'enseignant_id' => 2,
                'type'=> 'second cycle',
               
                
                
            ],
            [
               
                'libelle' => 'science physiques',
                'enseignant_id' => 3,
                'type'=> 'premier cycle',
               
                
                
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matieres');
    }
};
