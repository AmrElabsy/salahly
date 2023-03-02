<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("statuses")->insert(["name" => "تم الاستلام"]);
        DB::table("statuses")->insert(["name" => "تم الفحص"]);
        DB::table("statuses")->insert(["name" => "تم الرفض"]);
        DB::table("statuses")->insert(["name" => "تم التصليح"]);
        DB::table("statuses")->insert(["name" => "تم التسليم"]);
    }
}
