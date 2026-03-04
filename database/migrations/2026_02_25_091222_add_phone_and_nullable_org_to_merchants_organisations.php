<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('merchants', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            // Make organisation_id nullable so merchants can self-register
            // without being pre-assigned to an organisation
            $table->foreignId('organisation_id')->nullable()->change();
        });

        Schema::table('organisations', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
        });
    }

    public function down(): void
    {
        Schema::table('merchants', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->foreignId('organisation_id')->nullable(false)->change();
        });

        Schema::table('organisations', function (Blueprint $table) {
            $table->dropColumn('phone');
        });
    }
};
