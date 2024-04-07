<?php

declare(strict_types=1);

namespace App\Components\Product\Application\Factory;

use Illuminate\Support\Collection;

interface ProductDTOFactory
{
    public function toProductShortDTOs(array $uuids): Collection;
}
