<?php

declare(strict_types=1);

namespace App\Components\Product\Presentation\Listing;

use App\Components\Common\Listing\ListingTemplate;
use App\Components\Product\Domain\Model\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ProductListing extends ListingTemplate
{
    protected function useModel(): Model
    {
        return new Product();
    }

    protected function prepareColumns(): Collection
    {
        return collect([
            'name' => '',
        ]);
    }
}
