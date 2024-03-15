<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Facade;

use App\Components\Common\Listing\Parameter\Request\ParametersBag;
use App\Components\Common\Listing\View\DTO\ViewDTO;
use App\Components\User\Application\DTO\UserCreatable;
use App\Components\User\Application\DTO\UserToggleable;
use App\Components\User\Application\DTO\UserUpdatable;
use App\Components\User\Domain\DTO\UserDTO;
use App\Components\User\Infrastructure\Factories\UserDTOFactory;
use App\Components\User\Infrastructure\Repository\UserRepository;
use App\Components\User\Presentation\Listing\UserListing;

class UserFacade
{
    public function __construct(
        private readonly UserDTOFactory             $userDTOFactory,
        private readonly UserRepository             $userRepository,
        private readonly UserListing                $userListing,
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

    public function getSingleUser(int $id): ?UserDTO
    {
        $user = $this->userRepository->getByIdOrFail($id);

        if ($user === null) {
            return null;
        }

        return $this->userDTOFactory->createForFetched($user);
    }

    public function getUserListing(ParametersBag $bag): ViewDTO
    {
        return $this->userListing->create($bag);
    }
}
