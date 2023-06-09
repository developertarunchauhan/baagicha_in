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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('excrept');
            $table->text('body');
            $table->string('image');
            $table->string('tags');
            $table->string('meta_description');
            $table->string('seo_title');
            $table->string('status')->default('Published');
            $table->unsignedBigInteger('user_id')->references('id')->on('users')->onDeleteRestrict();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
