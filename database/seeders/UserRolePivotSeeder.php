<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolePivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('role_user')->insert([
        //     [
        //         'role_id' => '1',
        //         "user_id" =>'1',
        //         "user_type" =>'App\Models\User',
        //     ],
        //     [
        //         'role_id' => '2',
        //         "user_id" =>'2',
        //         "user_type" =>'App\Models\User',
        //     ],
        //     [
        //         'role_id' => '3',
        //         "user_id" =>'3',
        //         "user_type" =>'App\Models\User',
        //     ],
        //     [
        //         'role_id' => '3',
        //         "user_id" =>'4',
        //         "user_type" =>'App\Models\User',
        //     ],
        //     [
        //         'role_id' => '3',
        //         "user_id" =>'5',
        //         "user_type" =>'App\Models\User',
        //     ],
        // ]);

        $userRoleData=[];
         for ($i=1; $i <=2; $i++) {
            $userRoleData[] = [
                'role_id' =>1,
                'user_id' => $i,
                "user_type" =>'App\Models\User',
            ];
        }
        for ($i=3; $i <=5; $i++) {
            $userRoleData[] = [
                'role_id' =>2,
                'user_id' => $i,
                "user_type" =>'App\Models\User',
            ];
        }
        for ($i=6; $i <=60; $i++) {
            $userRoleData[] = [
                'role_id' =>3,
                'user_id' => $i,
                "user_type" =>'App\Models\User',
            ];
        }

        foreach ($userRoleData as $userRple) {
            DB::table('role_user')->insert($userRple);
        }
    }
}
