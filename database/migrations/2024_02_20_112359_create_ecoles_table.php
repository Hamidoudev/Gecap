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
        Schema::create('ecoles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('typeecole_id')->constrained('typeecoles')->onDelete('cascade');
            $table->string('nom');
            $table->string('siege');
            $table->string('email');
            $table->timestamps();
        });
        DB::table('ecoles')->insert([
            [
                'typeecole_id' => '1',
                'nom' => 'Nakani Doucoure',
                'siege' => 'Kati',
                'email' => 'nakanid@gmail.com',
                
            ],
            [
                'typeecole_id' => '2',
                'nom' => 'LNDN',
                'siege' => 'quartier fleuve',
                'email' => 'nakanid@gmail.com',
            ],
            [
                'typeecole_id' => '3',
                'nom' => 'Mama Thiam',
                'siege' => 'Hippodrome',
                'email' => 'nakanid@gmail.com',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecoles');
    }
};
