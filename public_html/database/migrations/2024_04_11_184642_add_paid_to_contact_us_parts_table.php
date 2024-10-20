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
        Schema::table('contact_us_parts', function (Blueprint $table) {
            $table->string('part_company')->after('part_email')->nullable();
            $table->string('part_city')->after('part_company')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_us_parts', function (Blueprint $table) {
            //
        });
    }
};
