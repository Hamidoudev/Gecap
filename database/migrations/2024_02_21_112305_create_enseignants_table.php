<?php

use App\Models\Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('enseignants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ecole_id')->constrained('ecoles')->onDelete('cascade');
            $table->string('matricule');
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_n');
            $table->string('email');
            $table->string('telephone');
            $table->string('adresse')->nullable();
            $table->binary('cv')->nullable();
            $table->string('password');
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade');
            $table->timestamps();
        });

        // DB::table('enseignants')->insert([

        //     [
        //         'ecole_id' => '1',
        //         'matricule' => '1',
        //         'nom' => 'Doucoure',
        //         'prenom' => 'Mamadou',
        //         'date_n' => '2022-01-01',
        //         'email' => 'mamadou@gmail.com',
        //         'telephone' => '8888888',
        //         'adresse' => 'Lafiabougou',
        //         'cv' => '1',
        //         'password' => Hash::make('@@@@@@@@'),
        //         'type_id' => '5',
      

                
        //     ],
        //     [
        //         'ecole_id' => '1',
        //         'matricule' => '2',
        //         'nom' => 'Sang',
        //         'prenom' => 'P',
        //         'date_n' => '2022-01-01 ',
        //         'email' => 'sang@gmail.com',
        //         'telephone' => '8888888',
        //         'adresse' => 'Sema',
        //         'cv' => '1',
        //         'password' => Hash::make('@@@@@@@@'),
        //         'type_id' => '5',
        //     ],
        //     [
        //         'ecole_id' => '1',
        //         'matricule' => '3',
        //         'nom' => 'Keîta',
        //         'prenom' => 'Famory',
        //         'date_n' => '2022-01-01',
        //         'email' => 'famory@gmail.com',
        //         'telephone' => '8888888',
        //         'adresse' => 'sebenikoro',
        //         'cv' => '1',
        //         'password' => Hash::make('@@@@@@@@'),
        //         'type_id' => '5',
        //     ],

        //     [
        //         'ecole_id' => '1',
        //         'matricule' => '4',
        //         'nom' => 'Keïta',
        //         'prenom' => 'Mamnai',
        //         'date_n' => '2022-01-01',
        //         'email' => 'keita@gmail.com',
        //         'telephone' => '8888888',
        //         'adresse' => 'mamarybougou',
        //         'cv' => '1',
        //         'password' => Hash::make('@@@@@@@@'),
        //         'type_id' => '5',
        //     ],
        //     [
        //         'ecole_id' => '1',
        //         'matricule' => '5',
        //         'nom' => 'Baba',
        //         'prenom' => 'Kante',
        //         'date_n' =>'2022-01-01',
        //         'email' => 'baba@gmail.com',
        //         'telephone' => '8888888',
        //         'adresse' => 'Hamdallaye',
        //         'cv' => '1',
        //         'password' => Hash::make('@@@@@@@@'),
        //         'type_id' => '5',
        //     ],
        // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseignants');
    }
};
