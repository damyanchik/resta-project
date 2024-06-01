<?php

declare(strict_types=1);

namespace App\Components\Common\Listing\View\DTO;

class ListingViewDTO
{
    public function __construct(
        readonly public array $items,
        readonly public array $flags,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'items' => $this->items,
            'flags' => $this->flags,
        ];
    }
}
