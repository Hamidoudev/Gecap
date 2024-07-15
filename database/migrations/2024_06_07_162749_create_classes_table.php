<?php

use App\Models\Cycle;
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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->foreignIdFor(Cycle::class)->constrained();
            $table->timestamps();
        });

        // DB::table('classes')->insert([
        //     [
        //         'libelle' => 'premiere année',
            
                
        //     ],
        //     [
        //         'libelle' => 'deuxieme année',
        //     ],
        // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
