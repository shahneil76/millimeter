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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->string('slug',255);
            $table->longText('content');
            $table->string('excerpt',500)->nullable();
            $table->string('featured_image',255)->nullable();
            $table->longText('image_caption')->nullable();
            $table->dateTime('published_on')->nullable();
            $table->boolean('status')->default(true);
            $table->string('meta_title',60)->nullable();
            $table->string('meta_description',255)->nullable();
            $table->enum('type', ['1', '2', '3', '4'])
                  ->comment("'1'='Publications', '2'='Blog', '3'='Events', '4'='Newsletters'");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
