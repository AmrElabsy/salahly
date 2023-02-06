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
        Schema::create('problems', function (Blueprint $table) {
            $table->id();
            $table->string("description");
            $table->integer("price");
            $table->integer("paid");
            $table->dateTime("due_time");
            
            $table->unsignedBigInteger("employee_id")->nullable();
            $table->unsignedBigInteger("branch_id");
            $table->unsignedBigInteger("device_id");
            $table->unsignedBigInteger("status_id");
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign("employee_id")->on("employees")->references("id")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->foreign("branch_id")->on("branches")->references("id")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->foreign("device_id")->on("devices")->references("id")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->foreign("status_id")->on("statuses")->references("id")->onDelete("CASCADE")->onUpdate("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problems');
    }
};
