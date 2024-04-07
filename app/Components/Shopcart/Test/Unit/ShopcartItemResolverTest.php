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

        $shopcartDTOs = Collection::make([
            new ShopcartItemFormableDTO(5, Str::uuid()->toString()),
            new ShopcartItemFormableDTO(10, Str::uuid()->toString()),
        ]);

        $productDTOs = Collection::make([
            Str::uuid()->toString() => new ProductShortDTO(50,true, false),
            '928b48e3-ed13-4991-bf3d-c0795e7ceed4' => new ProductShortDTO(100, false, false),
        ]);

        $resolved = $resolver->betweenRepositoryAndSession($shopcartDTOs, $productDTOs);
    }
}
