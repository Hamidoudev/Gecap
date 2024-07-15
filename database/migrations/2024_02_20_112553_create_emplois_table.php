<?php

use App\Models\trimestre;
use App\Models\Ue;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('emplois', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('classe_id')->unsigned();
            $table->bigInteger('enseignant_id')->unsigned()->nullable();
            $table->bigInteger('ecole_id')->unsigned();
            $table->bigInteger('cycle_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emplois');
    }
};
