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
        Schema::table('customers', function ($table) {
            $table->dropIfExists('name');
        });
        Schema::table('customers', function ($table) {
            $table->dropIfExists('email');
        });
        Schema::table('customers', function ($table) {
            $table->dropIfExists('address');
        });
        Schema::table('customers', function ($table) {
            $table->dropIfExists('state');
        });
        Schema::table('customers', function ($table) {
            $table->dropIfExists('city');
        });
        Schema::table('customers', function ($table) {
            $table->dropIfExists('contact');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function ($table) {
            $table->string('name');
        });
        Schema::table('customers', function ($table) {
            $table->string('email');
        });
        Schema::table('customers', function ($table) {
            $table->string('address');
        });
        Schema::table('customers', function ($table) {
            $table->string('state');
        });
        Schema::table('customers', function ($table) {
            $table->string('city');
        });
        Schema::table('customers', function ($table) {
            $table->string('contact');
        });
    }
};
