<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Amr Elabsy',
                'email' => 'amrelabsy55@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$AG36.kGGDiSMn5QO/EDLOutxYm.0UT66b906aBa7CYjIxx8yqU.7q',
                'remember_token' => '0QXebOxvw63F0cVwUH6MipihmKw3IeaYyk2O2BNkboAsU83Ik8sBY68xNBin',
                'created_at' => '2023-03-02 21:12:39',
                'updated_at' => '2023-03-02 21:12:39',
                'deleted_at' => NULL,
                'type' => 'employee',
            ),
            1 => 
            array (
                'id' => 17,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$4cQjTgMaHiMYl2GOgB758u2uUnnHA15dkGHp.g1dIr9VFEkGoX0Ve',
                'remember_token' => NULL,
                'created_at' => '2023-06-21 18:02:38',
                'updated_at' => '2023-06-21 18:02:38',
                'deleted_at' => NULL,
                'type' => 'employee',
            ),
        ));
        
        
    }
}