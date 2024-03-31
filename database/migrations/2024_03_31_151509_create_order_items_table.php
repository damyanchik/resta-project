<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Components\Order\Domain\Enum\OrderItemStatusEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('subtotal_unit_price');
            $table->unsignedInteger('total_unit_price');
            $table->unsignedInteger('subtotal_price');
            $table->unsignedInteger('total_price');
            $table->unsignedInteger('quantity');
            $table->enum('status', OrderItemStatusEnum::values())->default(OrderItemStatusEnum::PREPARING->value);
            $table->text('annotation')->nullable();
            $table->integer('order_nr')->default(0);
            $table->foreignUuid('product_uuid');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
