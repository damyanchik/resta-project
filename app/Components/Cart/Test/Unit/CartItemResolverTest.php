<?php

declare(strict_types=1);

namespace App\Components\Cart\Test\Unit;

use App\Components\Product\Domain\DTO\ProductShortDTO;
use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Infrastructure\Resolver\CartItemResolver;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;

class CartItemResolverTest extends TestCase
{
    public function testBetweenRepositoryAndSession(): void
    {
        $resolver = new CartItemResolver();

        $firstProductUuid = Str::uuid()->toString();
        $secondProductUuid = Str::uuid()->toString();

        $shopcartDTOs = Collection::make([
            new CartItemFormableDTO(5, $firstProductUuid),
            new CartItemFormableDTO(10, $secondProductUuid),
        ]);

        $productDTOs = Collection::make([
            $firstProductUuid => new ProductShortDTO(50,true, true),
            $secondProductUuid => new ProductShortDTO(100, false, false),
        ]);

        $resolved = $resolver->betweenRepositoryAndSession($shopcartDTOs, $productDTOs);

        dd($resolved);
    }
}
