<?php

declare(strict_types=1);

namespace App\Components\Common\Listing\Parameter\Request;

use App\Components\Common\Listing\Parameter\Enum\QueryOrderEnum;

interface ParametersBag
{
    public function getSelectedColumns(): array;
    public function getSearchColumns(): array;
    public function getSearchTerm(): string;
    public function getOrderColumn(): string;
    public function getOrderDirection(): QueryOrderEnum;
    public function getPerPage(): int;
}
