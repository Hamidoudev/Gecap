<?php

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
        //Schema::table('emploi_ues', function (Blueprint $table) {

            
          //  $table->dropForeign(['ues_id']);
            
          //  $table->foreign('emplois_id')->references('id')->on('emplois')->onDelete('CASCADE')->onUpdate('CASCADE');
       // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       // Schema::table('emploi_ues', function (Blueprint $table) {
         
           // $table->dropForeign('libelle');
   // });
}
};
