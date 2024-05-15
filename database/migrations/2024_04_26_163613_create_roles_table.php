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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->boolean('type');
            $table->timestamps();
        });

        DB::table('roles')->insert([
            [
                'nom' => 'Admin',
                'type' => 1,
            ],
            [
                'nom' => 'manager',
                'type' => 2,
            ],
            [
                'nom' => 'user',
                'type' => 3,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
