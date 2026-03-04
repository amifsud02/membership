<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('organisations', function (Blueprint $table) {
            $table->text('description')->nullable()->after('name');
            $table->string('logo')->nullable()->after('phone');
        });

        Schema::table('merchants', function (Blueprint $table) {
            $table->text('description')->nullable()->after('name');
            $table->string('logo')->nullable()->after('phone');
        });
    }

    public function down(): void
    {
        Schema::table('organisations', function (Blueprint $table) {
            $table->dropColumn(['description', 'logo']);
        });

        Schema::table('merchants', function (Blueprint $table) {
            $table->dropColumn(['description', 'logo']);
        });
    }
};
