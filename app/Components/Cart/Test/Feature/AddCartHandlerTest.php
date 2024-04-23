<?php

declare(strict_types=1);

namespace App\Components\Cart\Test\Feature;

use App\Components\Product\Domain\Model\Product;
use Tests\TestCase;

class AddCartHandlerTest extends TestCase
{
    public function testAddShopcart()
    {
        $product = Product::factory()->create();
        $this->post(route('shopcart.add', $product->uuid), [
            'quantity' => 5,
        ]);
    }
}
