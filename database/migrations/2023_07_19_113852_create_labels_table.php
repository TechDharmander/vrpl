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
        Schema::create('labels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('label')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('phone_number', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('address')->nullable();
            $table->integer('city_id')->unsigned()->default(0);
            $table->integer('state_id')->unsigned()->default(0);
            $table->integer('country_id')->unsigned()->default(0);
            $table->string('pincode', 10)->nullable();
            $table->string('agreement')->nullable();
            $table->string('govtid')->nullable();
            $table->string('cancel_cheque')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('account_type')->nullable();
            $table->string('place_of_business')->nullable();
            $table->string('panno')->nullable();
            $table->string('gstno')->nullable();
            $table->string('gst_image')->nullable();
            $table->string('pancard_image')->nullable();
            $table->string('sign')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labels');
    }
};
