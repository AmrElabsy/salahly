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
        Schema::create('material_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("material_id")->nullable();
            $table->date("start_date");
            $table->integer("price");
            $table->timestamps();
            $table->softDeletes();
            $table->foreign("material_id")->on("materials")->references("id")->onDelete("CASCADE")->onUpdate("CASCADE");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_prices');
    }
};
