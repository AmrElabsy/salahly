<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'add user',
                'guard_name' => 'web',
                'created_at' => '2023-05-06 00:01:18',
                'updated_at' => '2023-05-06 00:01:18',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'edit user',
                'guard_name' => 'web',
                'created_at' => '2023-05-06 00:01:18',
                'updated_at' => '2023-05-06 00:01:18',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'delete user',
                'guard_name' => 'web',
                'created_at' => '2023-05-06 00:01:18',
                'updated_at' => '2023-05-06 00:01:18',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'add problem',
                'guard_name' => 'web',
                'created_at' => '2023-05-06 00:01:18',
                'updated_at' => '2023-05-06 00:01:18',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'edit problem',
                'guard_name' => 'web',
                'created_at' => '2023-05-06 00:01:18',
                'updated_at' => '2023-05-06 00:01:18',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'delete problem',
                'guard_name' => 'web',
                'created_at' => '2023-05-06 00:01:18',
                'updated_at' => '2023-05-06 00:01:18',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'add service',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'edit service',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'delete service',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'show service',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'add material',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'edit material',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'delete material',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'show material',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'add attendance',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'edit attendance',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'delete attendance',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'show attendance',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'add branch',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'edit branch',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'delete branch',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'show branch',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'add word',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'edit word',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'delete word',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'show word',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'add category',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'edit category',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'delete category',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'show category',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'add customer',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'edit customer',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'delete customer',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'show customer',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'add device',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'edit device',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'delete device',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'show device',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'add feedback',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'edit feedback',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'delete feedback',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'show feedback',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'add holiday',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'edit holiday',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'delete holiday',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'show holiday',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'add status',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'edit status',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'delete status',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'show status',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'add supply',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'edit supply',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'delete supply',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'show supply',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:05:03',
                'updated_at' => '2023-06-21 17:05:03',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'show user',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:39:50',
                'updated_at' => '2023-06-21 17:39:50',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'show problem',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:39:50',
                'updated_at' => '2023-06-21 17:39:50',
            ),
            56 => 
            array (
                'id' => 59,
                'name' => 'add permission',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:50:07',
                'updated_at' => '2023-06-21 17:50:07',
            ),
            57 => 
            array (
                'id' => 60,
                'name' => 'edit permission',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:50:07',
                'updated_at' => '2023-06-21 17:50:07',
            ),
            58 => 
            array (
                'id' => 61,
                'name' => 'delete permission',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:50:07',
                'updated_at' => '2023-06-21 17:50:07',
            ),
            59 => 
            array (
                'id' => 62,
                'name' => 'show permission',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:50:07',
                'updated_at' => '2023-06-21 17:50:07',
            ),
            60 => 
            array (
                'id' => 63,
                'name' => 'add stored_supply',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:52:28',
                'updated_at' => '2023-06-21 17:52:28',
            ),
            61 => 
            array (
                'id' => 64,
                'name' => 'edit stored_supply',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:52:28',
                'updated_at' => '2023-06-21 17:52:28',
            ),
            62 => 
            array (
                'id' => 65,
                'name' => 'delete stored_supply',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:52:28',
                'updated_at' => '2023-06-21 17:52:28',
            ),
            63 => 
            array (
                'id' => 66,
                'name' => 'show stored_supply',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:52:28',
                'updated_at' => '2023-06-21 17:52:28',
            ),
            64 => 
            array (
                'id' => 67,
                'name' => 'add stored_material',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:52:28',
                'updated_at' => '2023-06-21 17:52:28',
            ),
            65 => 
            array (
                'id' => 68,
                'name' => 'edit stored_material',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:52:28',
                'updated_at' => '2023-06-21 17:52:28',
            ),
            66 => 
            array (
                'id' => 69,
                'name' => 'delete stored_material',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:52:28',
                'updated_at' => '2023-06-21 17:52:28',
            ),
            67 => 
            array (
                'id' => 70,
                'name' => 'show stored_material',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:52:28',
                'updated_at' => '2023-06-21 17:52:28',
            ),
            68 => 
            array (
                'id' => 71,
                'name' => 'add role',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:57:18',
                'updated_at' => '2023-06-21 17:57:18',
            ),
            69 => 
            array (
                'id' => 72,
                'name' => 'edit role',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:57:18',
                'updated_at' => '2023-06-21 17:57:18',
            ),
            70 => 
            array (
                'id' => 73,
                'name' => 'delete role',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:57:18',
                'updated_at' => '2023-06-21 17:57:18',
            ),
            71 => 
            array (
                'id' => 74,
                'name' => 'show role',
                'guard_name' => 'web',
                'created_at' => '2023-06-21 17:57:18',
                'updated_at' => '2023-06-21 17:57:18',
            ),
        ));
        
        
    }
}