<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Service;

use App\Components\Common\Listing\Parameter\Request\ParametersBag;
use App\Components\Common\Listing\View\DTO\ViewDTO;
use App\Components\User\Infrastructure\Listing\UserListing;

class UserService
{
    public function __construct(private readonly UserListing $userListing)
    {
    }

    public function getUserListingData(ParametersBag $bag): ViewDTO
    {
        return $this->userListing->create($bag);
    }
}
