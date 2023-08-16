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
        if (Schema::hasColumn('labels', 'bank_name')){
  
            Schema::table('labels', function (Blueprint $table) {
                $table->dropColumn(['bank_name','branch_name','account_holder_name','account_number','ifsc_code','account_type']);
            });
        }

        Schema::create('bank_details', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('account_type')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_details');
    }
};
