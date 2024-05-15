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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('role_id')->constrained();
            $table->foreignId('role_type_user_id')->constrained('role_type_users')->onDelete('cascade');
            $table->tinyInteger('type')->default(0);
            /* Users: 0=>User, 1=>Admin, 2=>Manager */
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'name' => 'Admin PDI',
                'email' => 'admin@pdi.com',
                'role_id' => 1,
                'role_type_user_id' => 1,
                'type' => 1,
                'password' => bcrypt('@@@@@@@@'),
            ],
            [
                'name' => 'Manager CAP',
                'email' => 'admin@cap.com',
                'role_id' => 2,
                'role_type_user_id' => 2,
                'type' => 2,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'role_id' => 3,
                'role_type_user_id' => 3,
                'type' => 3,
                'password' => bcrypt('123456'),
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
