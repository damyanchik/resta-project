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
            $table->uuid();
            $table->unsignedInteger('unit_nett_price');
            $table->unsignedInteger('unit_gross_price');
            $table->unsignedInteger('sum_nett_price');
            $table->unsignedInteger('sum_gross_price');
            $table->unsignedTinyInteger('rate');
            $table->unsignedInteger('quantity');
            $table->enum('status', OrderItemStatusEnum::values())->default(OrderItemStatusEnum::PREPARING->value);
            $table->text('message')->nullable();
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
