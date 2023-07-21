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
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('spotify')->nullable();
            $table->string('saavn')->nullable();
            $table->string('wynk')->nullable();
            $table->string('gaana')->nullable();
            $table->string('hungama')->nullable();
            $table->string('youtube')->nullable();
            $table->string('apple')->nullable();
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
        Schema::dropIfExists('artists');
    }
};
