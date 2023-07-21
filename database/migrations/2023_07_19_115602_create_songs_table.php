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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('isrc_code')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('label_id')->constrained();
            $table->string('audio')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('song_name')->nullable();
            $table->string('album_name')->nullable();
            $table->enum('adult', [0,1])->default(1);
            $table->string('song_duration')->nullable();
            $table->string('category')->nullable();
            $table->string('subcategory')->nullable();
            $table->string('genre')->nullable();
            $table->string('language')->nullable();
            $table->string('artist')->nullable();
            $table->string('featured_artist')->nullable();
            $table->string('composer')->nullable();
            $table->string('lyricist')->nullable();
            $table->string('producer')->nullable();
            $table->string('description')->nullable();
            $table->string('caller_tune_name')->nullable();
            $table->string('caller_tune_timing')->nullable();
            $table->string('date_for_live')->nullable();
            $table->string('status')->default('draft');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
