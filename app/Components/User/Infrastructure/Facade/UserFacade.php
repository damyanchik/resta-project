<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Facade;

use App\Components\Common\Listing\Parameter\Request\ParametersBag;
use App\Components\User\Application\DTO\UserCreatable;
use App\Components\User\Application\DTO\UserToggleable;
use App\Components\User\Application\DTO\UserUpdatable;
use App\Components\User\Infrastructure\Factories\UserFormationDTOFactory;
use App\Components\User\Infrastructure\Factories\ViewModel\ListingViewModelFactory;
use App\Components\User\Infrastructure\Factories\ViewModel\SingleUserViewModelFactory;
use App\Components\User\Infrastructure\Repository\UserRepository;
use App\Components\User\Presentation\Listing\UserListing;
use App\Components\User\Presentation\ViewModel\SingleUserViewModel;
use App\Components\User\Presentation\ViewModel\UserListingViewModel;

class UserFacade
{
    public function __construct(
        private readonly UserFormationDTOFactory    $userDTOFactory,
        private readonly UserRepository             $userRepository,
        private readonly UserListing                $userListing,
        private readonly ListingViewModelFactory    $listingViewModelFactory,
        private readonly SingleUserViewModelFactory $singleUserViewModelFactory,
    )
    {
    }

    public function createUser(UserCreatable $creatable): bool
    {
        $userDTO = $this->userDTOFactory->createForCreate($creatable);

        return $this->userRepository->create($userDTO);
    }

    public function updateUser(UserUpdatable $updatable, int $id): bool
    {
        $userDTO = $this->userDTOFactory->createForUpdate($updatable);

        return $this->userRepository->update($userDTO, $id);
    }

    public function deleteUser(int $id): bool
    {
        return $this->userRepository->delete($id);
    }

    public function toggleUserStatus(UserToggleable $userToggleable, int $id): bool
    {
        return $this->userRepository->toggleStatus($id, $userToggleable->isActive());
    }

    public function getSingleUser(int $id): ?SingleUserViewModel
    {
        $user = $this->userRepository->getByIdOrFail($id);

        if ($user === null) {
            return null;
        }

        return $this->singleUserViewModelFactory->createByUserModel($user);
    }

    public function getUserListing(ParametersBag $bag): UserListingViewModel
    {
        $userListingData = $this->userListing->create($bag);

        return $this->listingViewModelFactory->createByListingViewDTO($userListingData);
    }
}
