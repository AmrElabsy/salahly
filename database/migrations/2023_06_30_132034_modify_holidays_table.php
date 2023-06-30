<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("holidays", function (Blueprint $table) {
			$table->dropColumn("holiday");
			$table->date("start");
			$table->date("end");
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table("holidays", function (Blueprint $table) {
			$table->dropColumn("start");
			$table->dropColumn("end");
			$table->date("holiday");
		});
    }
};
