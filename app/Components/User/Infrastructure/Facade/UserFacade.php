<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Facade;

use App\Components\User\Application\DTO\UserCreatable;
use App\Components\User\Application\DTO\UserToggleable;
use App\Components\User\Application\DTO\UserUpdatable;
use App\Components\User\Domain\DTO\UserDTO;
use App\Components\User\Infrastructure\Factory\UserDTOFactory;
use App\Components\User\Infrastructure\Repository\UserRepository;

class UserFacade
{
    public function __construct(
        private readonly UserDTOFactory             $userDTOFactory,
        private readonly UserRepository             $userRepository,
    )
    {
    }

    public function createByCreatableValues(UserCreatable $creatable): bool
    {
        $userDTO = $this->userDTOFactory->createForCreate($creatable);

        return $this->userRepository->create($userDTO);
    }

    public function updateByUpdatableValues(UserUpdatable $updatable, string $uuid): bool
    {
        $userDTO = $this->userDTOFactory->createForUpdate($updatable);

        return $this->userRepository->update($userDTO, $uuid);
    }

    public function deleteByUuid(string $uuid): bool
    {
        return $this->userRepository->delete($uuid);
    }

    public function toggleUserStatus(UserToggleable $userToggleable, string $uuid): bool
    {
        return $this->userRepository->toggleStatus($uuid, $userToggleable->isActive());
    }

    public function getSingleUser(string $uuid): ?UserDTO
    {
        $user = $this->userRepository->getByUuidOrFail($uuid);

        if ($user === null) {
            return null;
        }

        return $this->userDTOFactory->createForFetched($user);
    }
}
