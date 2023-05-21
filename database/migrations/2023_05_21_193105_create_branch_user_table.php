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
        Schema::create('branch_user', function (Blueprint $table) {
            $table->id();
    
            $table->unsignedBigInteger("branch_id");
            $table->unsignedBigInteger("user_id");
    
            $table->timestamps();
            $table->softDeletes();
    
            $table->foreign("user_id")->on("users")->references("id")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->foreign("branch_id")->on("branches")->references("id")->onDelete("CASCADE")->onUpdate("CASCADE");
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch_user');
    }
};
