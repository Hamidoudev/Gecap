<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Admin PDI',
               'email'=>'admin@pdi.com',
               'role_id'=>1,
               'role_type_user_id'=>1,
               'type'=>1,
               'password'=> bcrypt('@@@@@@@@'),
            ],
            [
               'name'=>'Manager CAP',
               'email'=>'admin@cap.com',
               'role_id'=>2,
               'role_type_user_id'=>2,
               'type'=> 2,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'User',
               'email'=>'user@gmail.com',
               'role_id'=>3,
               'role_type_user_id'=>3,
               'type'=>3,
               'password'=> bcrypt('123456'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}