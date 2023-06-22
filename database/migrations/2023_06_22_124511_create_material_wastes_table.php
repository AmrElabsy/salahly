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
        Schema::create('material_wastes', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger("material_id");
			$table->integer("amount");
			$table->timestamps();
			$table->softDeletes();
	
			$table->foreign("material_id")->on("materials")->references("id")->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_wastes');
    }
};
