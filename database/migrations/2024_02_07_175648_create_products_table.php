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
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->tinyInteger('availability')->unsigned()->default(0);
            $table->integer('stock')->unsigned();
            $table->integer('price')->unsigned();
            $table->tinyInteger('is_unlimited_stock')->unsigned()->default(0);
            $table->tinyInteger('is_vegetarian')->unsigned()->default(0);
            $table->tinyInteger('is_spicy')->unsigned()->default(0);
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
