<?php

use App\Models\Type;
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
            $table->string('password');
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade');
            $table->timestamps();
        });
        DB::table('ecoles')->insert([
            [
                'typeecole_id' => '1',
                'nom' => 'Nakani Doucoure',
                'siege' => 'Kati',
                'email' => 'nakanid@gmail.com',
                'password' => bcrypt('@@@@@@@@'),
                'type_id' => '4',
      

                
            ],
            [
                'typeecole_id' => '2',
                'nom' => 'LNDN',
                'siege' => 'quartier fleuve',
                'email' => 'lndn@gmail.com',
                'password' => bcrypt('@@@@@@@@'),
                'type_id' => '4',
            ],
            [
                'typeecole_id' => '3',
                'nom' => 'Mama Thiam',
                'siege' => 'Hippodrome',
                'email' => 'mamathiam@gmail.com',
                'password' => bcrypt('@@@@@@@@'),
                'type_id' => '4',
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
