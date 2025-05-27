<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Hindari error jika kolom sudah ada
        if (!Schema::hasColumn('users', 'role_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->unsignedBigInteger('role_id')->nullable()->after('password');
                $table->foreign('role_id')->references('id')->on('roles');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { {
            if (Schema::hasColumn('users', 'role_id')) {
                Schema::table('users', function (Blueprint $table) {
                    $table->dropForeign(['role_id']);
                    $table->dropColumn('role_id');
                });
            }
        }
    }
};
