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
            ...Column::build('uuid')->visible(false)->sortable()->get(),
            ...Column::build('name')->visible()->sortable()->searchable()->get(),
            ...Column::build('stock')->visible()->sortable()->searchable()->get(),
            ...Column::build('price')->visible()->sortable()->searchable()->get(),
            ...Column::build('description')->visible()->sortable()->searchable()->get(),
            ...Column::build('is_unlimited')->visible()->sortable()->get(),
            ...Column::build('is_vegetarian')->visible()->sortable()->get(),
            ...Column::build('is_spicy')->visible()->sortable()->get(),
            ...Column::build('is_available')->visible()->sortable()->get(),
            ...Column::build('category_uuid')->visible()->sortable()->searchable()->get(),
            ...Column::build('order_nr')->visible()->sortable()->get(),
        ]);
    }
}
