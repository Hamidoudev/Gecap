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
        Schema::create('type_droit', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->timestamps();
        });

        DB::table('type_droit')->insert([
            [
                'nom' => 'ecriture',
               
                
                
            ],
            [
                'nom' => 'lecture',
               
            ],
            [
                'nom' => 'edit',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_droit');
    }
};
