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
      //  Schema::table('emploi_trims', function (Blueprint $table) {

            
          //  $table->dropForeign(['trimestre_id']);
            
//$table->foreign('trimestre_id', 'libelle')->references('id')->on('trimestres')->onDelete('CASCADE')->onUpdate('CASCADE');
        //});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::table('emploi_trims', function (Blueprint $table) {
         
            //$table->dropForeign('libelle');
  //  });
}
    
};
