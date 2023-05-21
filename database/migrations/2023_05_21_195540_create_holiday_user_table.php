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
        Schema::create('holiday_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("holiday_id");
    
            $table->timestamps();
    
            $table->foreign("user_id")->on("users")->references("id")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->foreign("holiday_id")->on("holidays")->references("id")->onDelete("CASCADE")->onUpdate("CASCADE");
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('holiday_user');
    }
};
