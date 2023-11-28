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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'designation')) {
                $table->string('designation')->nullable();

            }
            if (!Schema::hasColumn('users', 'department')) {
                $table->string('department')->nullable();

            }
            if (!Schema::hasColumn('users', 'address')) {
                $table->string('address')->nullable();
            }
            if (!Schema::hasColumn('users', 'state')) {
                $table->string('state')->nullable();

            }
            if (!Schema::hasColumn('users', 'city')) {
                $table->string('city')->nullable();

            }
            
            if (!Schema::hasColumn('users', 'contact')) {
                $table->integer('contact')->nullable();

            }
            if (!Schema::hasColumn('users', 'action')) {
                $table->integer('action')->nullable();

            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'designation')) {
                $table->dropColumn('designation');
            }
            if (Schema::hasColumn('users', 'department')) {
                $table->dropColumn('department');
            }
            if (Schema::hasColumn('users', 'address')) {
                $table->dropColumn('address');
            }
            if (Schema::hasColumn('users', 'state')) {
                $table->dropColumn('state');
            }
            if (Schema::hasColumn('users', 'city')) {
                $table->dropColumn('city');
            }
            if (Schema::hasColumn('users', 'contact')) {
                $table->dropColumn('contact');
            }
            
            if (Schema::hasColumn('users', 'action')) {
                $table->dropColumn('action');
            }
        });
    }
};