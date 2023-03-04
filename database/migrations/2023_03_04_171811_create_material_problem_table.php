<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    return new class extends Migration {
        public function up() {
            Schema::create('material_problem', function ( Blueprint $table ) {
                $table->id();
                
                $table->unsignedBigInteger("material_id");
                $table->unsignedBigInteger("problem_id");
                $table->integer("price");
                $table->timestamps();
                
                $table->foreign("material_id")->on("materials")->references("id")->onDelete("CASCADE")->onUpdate("CASCADE");
                $table->foreign("problem_id")->on("problems")->references("id")->onDelete("CASCADE")->onUpdate("CASCADE");
            });
        }
        
        public function down() {
            Schema::dropIfExists('material_problem');
        }
    };