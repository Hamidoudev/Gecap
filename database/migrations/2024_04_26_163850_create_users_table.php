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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('profile_picture')->nullable();
            $table->foreignId('role_id')->constrained();
            $table->foreignId('role_type_user_id')->constrained('role_type_users')->onDelete('cascade');
            $table->tinyInteger('type')->default(0);
            /* Users: 0=>User, 1=>Admin, 2=>Manager */
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'first_name' => 'Hamidou',
                'last_name' => 'Dembélé',
                'email' => 'admin@pdi.com',
                'phone' => '77777777',
                'username' => 'hamidou',
                'role_id' => 1,
                'role_type_user_id' => 1,
                'type' => 1,
                'password' => bcrypt('@@@@@@@@'),
                'profile_picture' => 'HD',
            ],
            [
                'first_name' => 'Eve',
                'last_name' => 'Coulibaly',
                'email' => 'admin@cap.com',
                'phone' => '77777777',
                'username' => 'eve',
                'role_id' => 2,
                'role_type_user_id' => 2,
                'type' => 2,
                'password' => bcrypt('123456'),
                'profile_picture' => 'EC',
            ],
            [
                'first_name' => 'LN',
                'last_name' => 'DN',
                'email' => 'lndn@ecole.com',
                'phone' => '77777777',
                'username' => 'lndn',
                'role_id' => 3,
                'role_type_user_id' => 3,
                'type' => 3,
                'password' => bcrypt('123456'),
                'profile_picture' => 'LNDN',
            ],
            [
                'first_name' => 'Mama',
                'last_name' => 'Tiam',
                'email' => 'mamatiam@ecole.com',
                'phone' => '77777777',
                'username' => 'mamathiam',
                'role_id' => 3,
                'role_type_user_id' => 3,
                'type' => 3,
                'password' => bcrypt('123456'),
                'profile_picture' => 'MAMATHIAM',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
    
};
