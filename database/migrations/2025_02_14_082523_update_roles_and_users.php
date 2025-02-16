<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateRolesAndUsers extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Remove the 'User' role using DB facade
        DB::table('roles')->where('name', 'User')->delete();

        // Modify the default role_id for users
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->default(2)->constrained('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Re-add the 'User' role using DB facade
        DB::table('roles')->insert(['name' => 'User']);

        // Revert the default role_id to 3
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->default(3)->constrained('roles')->onDelete('cascade');
        });
    }
}