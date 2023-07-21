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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150)->nullable();
            $table->string('slug', 150)->unique();
            $table->float('price', 8, 2)->default(0);
            $table->float('final_price')->default(0);
            $table->text('keypoints')->nullable();
            $table->text('description')->nullable();
            $table->char('no_of_songs', 5)->default(1);
            $table->foreignId('plan_category_id')->constrained('plan_categories')->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
