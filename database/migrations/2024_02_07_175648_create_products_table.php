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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedInteger('stock');
            $table->unsignedInteger('price');
            $table->unsignedSmallInteger('rate')->nullable();
            $table->boolean('is_unlimited')->default(false);
            $table->boolean('is_vegetarian')->default(false);
            $table->boolean('is_spicy')->default(false);
            $table->boolean('is_available')->default(false);
            $table->integer('order_nr')->default(0);
            $table->foreignUuid('category_uuid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
