<?php

declare(strict_types=1);

namespace App\Components\Cart\Test\Unit;

use App\Components\Product\Domain\DTO\ProductAvailableDTO;
use App\Components\Product\Domain\DTO\ProductShortDTO;
use App\Components\Cart\Domain\DTO\CartItemFormableDTO;
use App\Components\Cart\Infrastructure\Resolver\CartResolver;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;

class CartItemResolverTest extends TestCase
{
    public function testBetweenRepositoryAndSession(): void
    {
        $resolver = new CartResolver();

        $firstProductUuid = Str::uuid()->toString();
        $secondProductUuid = Str::uuid()->toString();

        $cartDTOs = Collection::make([
            new CartItemFormableDTO(5, $firstProductUuid),
            new CartItemFormableDTO(10, $secondProductUuid),
        ]);

        $productDTOs = Collection::make([
            $firstProductUuid => new ProductAvailableDTO(50,true, true),
            $secondProductUuid => new ProductAvailableDTO(100, false, false),
        ]);

        $resolved = $resolver->resolveBetweenRepositoryAndSession($cartDTOs, $productDTOs);

        dd($resolved);
    }
}
