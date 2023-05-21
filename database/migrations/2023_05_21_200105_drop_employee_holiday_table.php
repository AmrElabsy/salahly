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
        Schema::dropIfExists('employee_holiday');
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('employee_holiday', function ( Blueprint $table ) {
            $table->id();
            $table->unsignedBigInteger("employee_id");
            $table->unsignedBigInteger("holiday_id");
        
            $table->timestamps();
        
            $table->foreign("employee_id")->on("employees")->references("id")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->foreign("holiday_id")->on("holidays")->references("id")->onDelete("CASCADE")->onUpdate("CASCADE");
        });
    }
};
