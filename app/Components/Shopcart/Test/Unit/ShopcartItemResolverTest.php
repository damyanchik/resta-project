<?php

declare(strict_types=1);

namespace App\Components\Shopcart\Test\Unit;

use App\Components\Product\Domain\DTO\ProductShortDTO;
use App\Components\Shopcart\Domain\DTO\ShopcartItemFormableDTO;
use App\Components\Shopcart\Infrastructure\Resolver\ShopcartItemResolver;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;

class ShopcartItemResolverTest extends TestCase
{
    public function testBetweenRepositoryAndSession(): void
    {
        $resolver = new ShopcartItemResolver();

        $firstProductUuid = Str::uuid()->toString();
        $secondProductUuid = Str::uuid()->toString();

        $shopcartDTOs = Collection::make([
            new ShopcartItemFormableDTO(5, $firstProductUuid),
            new ShopcartItemFormableDTO(10, $secondProductUuid),
        ]);

        $productDTOs = Collection::make([
            $firstProductUuid => new ProductShortDTO(50,true, true),
            $secondProductUuid => new ProductShortDTO(100, false, false),
        ]);

        $resolved = $resolver->betweenRepositoryAndSession($shopcartDTOs, $productDTOs);

        dd($resolved);
    }
}
