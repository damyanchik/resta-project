<?php

declare(strict_types=1);

namespace App\Modules\Listing\Parameter\Request;

use App\Modules\Listing\Parameter\Enum\QueryOrderEnum;

interface ParametersBag
{
    public function getSelectedColumns(): array;
    public function getSearchColumns(): array;
    public function getSearchTerm(): string;
    public function getOrderColumn(): string;
    public function getOrderDirection(): QueryOrderEnum;
    public function getPerPage(): int;
}
