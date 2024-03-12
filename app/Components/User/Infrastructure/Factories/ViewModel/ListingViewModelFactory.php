<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Factories\ViewModel;

use App\Components\Common\Listing\View\DTO\ViewDTO;
use App\Components\User\Presentation\ViewModel\UserListingViewModel;

class ListingViewModelFactory
{
    public function createByListingViewDTO(ViewDTO $viewDTO): UserListingViewModel
    {
        return new UserListingViewModel(
            users: $viewDTO->data->toArray(),
            flags: $viewDTO->flags->toArray(),
        );
    }
}
