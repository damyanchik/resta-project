<?php

declare(strict_types=1);

namespace App\Components\Product\Presentation\Listing;

use App\Components\Common\Listing\ListingTemplate;
use App\Components\Common\Listing\View\Builder\ColumnBuilder\Column;
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
            'id' => Column::build()->visible(false)->sortable()->get(),
            'name' => Column::build()->visible()->sortable()->searchable()->get(),
            'stock' => Column::build()->visible()->sortable()->searchable()->get(),
            'price' => Column::build()->visible()->sortable()->searchable()->get(),
            'is_unlimited' => Column::build()->visible()->sortable()->get(),
            'is_vegetarian' => Column::build()->visible()->sortable()->get(),
            'is_spicy' => Column::build()->visible()->sortable()->get(),
            'is_available' => Column::build()->visible()->sortable()->get(),
            'category_id' => Column::build()->visible()->sortable()->searchable()->get(),
            'order_nr' => Column::build()->visible()->sortable()->get(),
        ]);
    }
}
