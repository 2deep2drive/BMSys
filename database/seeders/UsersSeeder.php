<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('Users')->insert([
            [
                'fname' => 'Admin01',
                "lname" => 'admin01',
                "uname" => 'admin_0001',
                "email" => 'admin1@gmail.com',
                // "password" => 'Admin#0001',
                'password' => Hash::make('Admin#0001'),
                'isVerified' =>0,
                'email_verified_at' => now(),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'fname' => 'Admin02',
                "lname" => 'admin02',
                "uname" => 'admin_0002',
                "email" => 'admin2@gmail.com',
                // "password" => 'Admin#0002',
                'password' => Hash::make('Admin#0002'),
                'isVerified' => 0,
                'email_verified_at' => now(),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'fname' => 'Mod01',
                "lname" => 'mod01',
                "uname" => 'mod_0001',
                "email" => 'mod1@gmail.com',
                // "password" => 'Mod#0001',
                'password' => Hash::make('Mod#0001'),
                'isVerified' => 0,
                'email_verified_at' => now(),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'fname' => 'Mod02',
                "lname" => 'mod03',
                "uname" => 'mod_0002',
                "email" => 'mod2@gmail.com',
                // "password" => 'Mod#0002',
                'password' => Hash::make('Mod#0002'),
                'isVerified' => 0,
                'email_verified_at' => now(),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'fname' => 'Mod03',
                "lname" => 'mod03',
                "uname" => 'mod_0003',
                "email" => 'mod3@gmail.com',
                // "password" => 'Mod#0003',
                'password' => Hash::make('Mod#0003'),
                'isVerified' => 0,
                'email_verified_at' => now(),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'fname' => 'User',
                "lname" => 'One',
                "uname" => 'user_0001',
                "email" => 'user1@gmail.com',
                // "password" => 'User#0001',
                'password' => Hash::make('User#0001'),
                'isVerified'=>0,
                'email_verified_at' => now(),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'fname' => 'User',
                "lname" => 'Two',
                "uname" => 'user_0002',
                "email" => 'user2@gmail.com',
                // "password" =>'User#0002',
                'password' => Hash::make('User#0002'),
                'isVerified'=>0,
                'email_verified_at' => now(),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'fname' => 'User',
                "lname" => 'Three',
                "uname" => 'user_0003',
                "email" => 'user3@gmail.com',
                // "password" => 'User#0003',
                'password' => Hash::make('User#0003'),
                'isVerified'=>0,
                'email_verified_at' => now(),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'fname' => 'User',
                "lname" => 'Four',
                "uname" => 'user_0004',
                "email" => 'user4@gmail.com',
                // "password" => 'User#0004',
                'password' => Hash::make('User#0004'),
                'isVerified'=>0,
                'email_verified_at' => now(),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'fname' => 'User',
                "lname" => 'Five',
                "uname" => 'user_0005',
                "email" => 'user5@gmail.com',
                // "password" => 'User#0005',
                'password' => Hash::make('User#0005'),
                'isVerified'=>0,
                'email_verified_at' => now(),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

        ]);
        User::factory(50)->create();
       
    }
}
