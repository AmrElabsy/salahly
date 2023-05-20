<?php
    
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    
    return new class extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::table('employee_holiday', function ( Blueprint $table ) {
                $table->softDeletes();
            });
            Schema::table('words', function ( Blueprint $table ) {
                $table->softDeletes();
            });
            Schema::table('category_problem', function ( Blueprint $table ) {
                $table->softDeletes();
            });
            Schema::table('attendances', function ( Blueprint $table ) {
                $table->softDeletes();
            });
            Schema::table('phones', function ( Blueprint $table ) {
                $table->softDeletes();
            });
            Schema::table('material_problem', function ( Blueprint $table ) {
                $table->softDeletes();
            });
            Schema::table('branch_employee', function ( Blueprint $table ) {
                $table->softDeletes();
            });
        }
        
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::table('employee_holiday', function ( Blueprint $table ) {
                $table->dropSoftDeletes();
            });
            Schema::table('words', function ( Blueprint $table ) {
                $table->dropSoftDeletes();
            });
            Schema::table('category_problem', function ( Blueprint $table ) {
                $table->dropSoftDeletes();
            });
            Schema::table('attendances', function ( Blueprint $table ) {
                $table->dropSoftDeletes();
            });
            Schema::table('phones', function ( Blueprint $table ) {
                $table->dropSoftDeletes();
            });
            Schema::table('material_problem', function ( Blueprint $table ) {
                $table->dropSoftDeletes();
            });
            Schema::table('branch_employee', function ( Blueprint $table ) {
                $table->dropSoftDeletes();
            });
        }
    };
