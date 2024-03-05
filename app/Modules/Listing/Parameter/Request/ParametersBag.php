<?php

declare(strict_types=1);

namespace App\Modules\Listing\Parameter\Request;

use App\Modules\Listing\Parameter\Enum\Order;

interface ParametersBag
{
    public function getSelectedColumns(): array;
    public function getSearchColumns(): array;
    public function getSearchTerm(): string;
    public function getOrderColumn(): string;
    public function getOrderDirection(): Order;
    public function getPerPage(): int;
}
