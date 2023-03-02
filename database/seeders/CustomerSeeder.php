<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::insert([
            ["name" => "Amr Elabsy"],
            ["name" => "Belal Ahmed"],
            ["name" => "Muslem Ahmed"],
        ]);
    }
}
