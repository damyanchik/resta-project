<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Test\Feature;

use App\Components\Product\Domain\Model\Product;
use Illuminate\Support\Str;
use Tests\TestCase;

class AddShopcartHandlerTest extends TestCase
{
    public function testAddShopcart()
    {
        $product = Product::factory()->create();
        $this->post(route('shopcart.add', $product->uuid), [
            'quantity' => 5,
        ]);
    }
}
