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
        Schema::table('problems', function (Blueprint $table) {
            $table->dropForeign(["employee_id"]);
            $table->dropColumn("employee_id");
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->on("users")->references("id")->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('problems', function (Blueprint $table) {
            $table->dropForeign(["user_id"]);
            $table->dropColumn("user_id");
            $table->unsignedBigInteger("employee_id");
            $table->foreign("employee_id")->on("employees")->references("id")->onDelete("CASCADE");
    
        });
    }
};
