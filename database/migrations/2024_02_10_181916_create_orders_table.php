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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid();
            $table->string('status');
            $table->string('type');
            $table->unsignedInteger('subtotal_amount');
            $table->unsignedInteger('total_amount');
            $table->string('payment_method')->nullable();
            $table->boolean('is_paid')->default(false);
            $table->text('annotation')->nullable();
            $table->timestamps();
        });
    }
        // +delivery model + instruction
        // +customer model
        // +orderDirection items model +
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
