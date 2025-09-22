<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pets', function (Blueprint $table) {
            // First add the column if it doesn't exist, then change it
            if (!Schema::hasColumn('pets', 'gender')) {
                $table->enum('gender', ['male', 'female', 'unknown'])->default('unknown');
            } else {
                $table->enum('gender', ['male', 'female', 'unknown'])->default('unknown')->change();
            }
        });
    }

    public function down(): void
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->dropColumn('gender');
        });
    }
};
