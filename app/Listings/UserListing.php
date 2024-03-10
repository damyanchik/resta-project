<?php

declare(strict_types=1);

namespace App\Listings;

use App\Components\Common\Listing\ListingTemplate;
use App\Components\Common\Listing\View\Builder\ColumnBuilder\Column;
use App\Models\User;
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
            'surname' => Column::build()->sortable()->searchable()->get(),
            'email' => Column::build()->visible()->sortable()->searchable()->get(),
        ]);
    }

    protected function createActions(): array
    {
        return [
//            'delete' => Action::build()
//                ->addTag('form', 'destroy')
//                ->addIcon('bin')
//                ->addRoute('test')
//                ->addDescription('Fajny przycisk')
//                ->get(),
        ];
    }
}