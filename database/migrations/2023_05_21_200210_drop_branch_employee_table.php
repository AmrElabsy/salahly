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
        Schema::dropIfExists('branch_employee');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('branch_employee', function ( Blueprint $table ) {
            $table->id();
        
            $table->unsignedBigInteger("branch_id");
            $table->unsignedBigInteger("employee_id");
        
            $table->timestamps();
        
            $table->foreign("employee_id")->on("employees")->references("id")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->foreign("branch_id")->on("branches")->references("id")->onDelete("CASCADE")->onUpdate("CASCADE");
        
        });
    }
};
