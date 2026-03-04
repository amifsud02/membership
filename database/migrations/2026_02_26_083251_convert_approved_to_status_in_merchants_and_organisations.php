<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Handle Organisations
        Schema::table('organisations', function (Blueprint $table) {
            $table->string('status')->default('pending')->after('logo');
        });

        DB::table('organisations')->where('approved', true)->update(['status' => 'approved']);
        DB::table('organisations')->where('approved', false)->update(['status' => 'pending']);

        Schema::table('organisations', function (Blueprint $table) {
            $table->dropColumn('approved');
        });

        // Handle Merchants
        Schema::table('merchants', function (Blueprint $table) {
            $table->string('status')->default('pending')->after('logo');
        });

        DB::table('merchants')->where('approved', true)->update(['status' => 'approved']);
        DB::table('merchants')->where('approved', false)->update(['status' => 'pending']);

        Schema::table('merchants', function (Blueprint $table) {
            $table->dropColumn('approved');
        });
    }

    public function down(): void
    {
        Schema::table('organisations', function (Blueprint $table) {
            $table->boolean('approved')->default(false)->after('status');
        });
        
        DB::table('organisations')->where('status', 'approved')->update(['approved' => true]);
        
        Schema::table('organisations', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('merchants', function (Blueprint $table) {
            $table->boolean('approved')->default(false)->after('status');
        });

        DB::table('merchants')->where('status', 'approved')->update(['approved' => true]);

        Schema::table('merchants', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
