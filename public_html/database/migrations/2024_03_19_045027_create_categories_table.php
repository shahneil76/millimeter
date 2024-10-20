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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('short_code')->nullable();
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('bolder_text')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('image_path')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
