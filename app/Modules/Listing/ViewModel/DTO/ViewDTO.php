<?php

declare(strict_types=1);

namespace App\Modules\Listing\ViewModel\DTO;

use Illuminate\Support\Collection;

class ViewDTO
{
    public function __construct(
        readonly public object     $viewData,
        readonly public Collection $viewFlags,
    )
    {
    }
}
