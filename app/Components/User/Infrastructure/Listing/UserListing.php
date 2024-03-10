<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Listing;

use App\Components\Common\Listing\ListingTemplate;
use App\Components\Common\Listing\View\Builder\ColumnBuilder\Column;
use App\Components\User\Domain\Model\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class UserListing extends ListingTemplate
{

    protected function useModel(): Model
    {
        return new User();
    }

    protected function prepareColumns(): Collection
    {
        return collect([
            'id' => Column::build()->visible(false)->sortable()->get(),
            'name' => Column::build()->visible()->sortable()->searchable()->get(),
            'surname' => Column::build()->visible()->sortable()->searchable()->get(),
            'email' => Column::build()->visible()->sortable()->searchable()->get(),
        ]);
    }
}
