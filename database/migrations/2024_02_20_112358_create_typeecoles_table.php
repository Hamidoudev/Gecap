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
        Schema::create('type_ecoles', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->timestamps();
        });
        DB::table('typeecoles')->insert([
            [
                'libelle' => 'Public',
            
                
            ],
            [
                'libelle' => 'Priviée',
            ],
            [
                'libelle' => 'Semi-public',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('typeecoles');
    }
};
