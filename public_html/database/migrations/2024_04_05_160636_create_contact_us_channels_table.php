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
        Schema::create('contact_us_channels', function (Blueprint $table) {
            $table->id();
            $table->string('channel_name');
            $table->string('channel_designation');
            $table->string('channel_phoneno');
            $table->string('channel_email');
            $table->string('channel_message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us_channels');
    }
};
