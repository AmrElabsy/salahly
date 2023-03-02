<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    return new class extends Migration {
        public function up() {
            Schema::table('employees', function ( Blueprint $table ) {
                $table->unsignedBigInteger("user_id");
                
                $table->foreign("user_id")->on("users")->references("id")->onUpdate("CASCADE")->onDelete("CASCADE");
            });
        }
        
        public function down() {
            Schema::table('employees', function ( Blueprint $table ) {
                $table->dropColumn("user_id");
            });
        }
    };