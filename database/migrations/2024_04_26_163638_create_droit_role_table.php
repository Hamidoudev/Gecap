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
        Schema::create('droit_role', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->foreignId('droit_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
        DB::table('droit_role')->insert([
            [
               
                'role_id' => 1,
                'droit_id' => 1,
               
               
                
                
            ],
            [
               
                'role_id' => 1,
                'droit_id' => 2,
               
               
                
                
            ],
             [
               
                'role_id' => 1,
                'droit_id' => 3,
               
               
                
                
            ],
             [
               
                'role_id' => 1,
                'droit_id' => 4,
               
               
                
                
            ],
             [
               
                'role_id' => 1,
                'droit_id' => 5,
               
               
                
                
            ],
             [
               
                'role_id' => 1,
                'droit_id' => 10,
               
               
                
                
            ],
            [
               
                'role_id' => 1,
                'droit_id' => 11,
               
               
                
                
            ],
             [
               
                'role_id' => 2,
                'droit_id' => 1,
               
               
                
                
            ],
             [
               
                'role_id' => 2,
                'droit_id' => 3,
               
               
                
                
            ],
             [
               
                'role_id' => 3,
                'droit_id' => 1,
               
               
                
                
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('droits_role');
    }
};
