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
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        DB::table('types')->insert([
            [
                'name' => 'admin',
                
                
                
            ],
            [
                'name' => 'manager',
                
                
            ],
             [
                'name' => 'user',
                
                
            ],
            [
                'name' => 'ecole',
                
                
            ],
            [
                'name' => 'enseignant',
                
                
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types');
    }
    
};
