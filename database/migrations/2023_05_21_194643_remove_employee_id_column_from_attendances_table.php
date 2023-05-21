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
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropForeign(["employee_id"]);
            $table->dropColumn("employee_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->unsignedBigInteger("employee_id");
            $table->foreign("employee_id")->on("employees")->references("id")->onDelete("CASCADE")->onUpdate("CASCADE");
        });
    }
};
