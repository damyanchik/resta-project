<?php

declare(strict_types=1);

namespace App\Components\Common\Listing\View\DTO;

use Illuminate\Support\Collection;

class ViewDTO
{
    public function __construct(
        readonly public object     $data,
        readonly public Collection $flags,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'data' => $this->data,
            'flags' => $this->flags,
        ];
    }
}
