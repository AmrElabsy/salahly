<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'guard_name' => 'web',
                'created_at' => '2023-05-06 00:03:17',
                'updated_at' => '2023-05-06 00:03:17',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Receptionsit',
                'guard_name' => 'web',
                'created_at' => '2023-05-06 00:03:59',
                'updated_at' => '2023-05-06 00:03:59',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Engineer',
                'guard_name' => 'web',
                'created_at' => '2023-05-06 00:04:10',
                'updated_at' => '2023-05-06 00:04:10',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Employee',
                'guard_name' => 'web',
                'created_at' => '2023-05-21 18:55:12',
                'updated_at' => '2023-05-21 18:55:12',
            ),
        ));
        
        
    }
}