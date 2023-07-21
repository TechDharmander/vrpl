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
        Schema::create('plan_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->nullable();
            $table->string('slug', 100)->unique();
            $table->string('short_title')->nullable();
            $table->text('keypoints')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', [0,1])->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_categories');
    }
};
