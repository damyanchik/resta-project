<?php

declare(strict_types=1);

namespace App\Components\User\Infrastructure\Service;

use App\Components\Common\Listing\Parameter\Request\ParametersBag;
use App\Components\User\Infrastructure\Repository\UserRepository;
use App\Components\User\Presentation\Listing\UserListing;
use App\Components\User\Presentation\ViewModel\UserListingViewModel;
use Illuminate\Database\Eloquent\Model;

class UserService
{
    public function __construct(
        private readonly UserListing $userListing,
        private readonly UserRepository $userRepository,
    )
    {
    }

    public function getUserListingData(ParametersBag $bag): array
    {
        $viewDto = $this->userListing->create($bag);

        $viewModel = new UserListingViewModel(
            $viewDto->data->toArray(),
            $viewDto->flags->toArray(),
        );

        return $viewModel->toArray();
    }

    public function getById(int $id): ?array
    {
        return $this->userRepository->getByIdOrFail($id)->toArray();
    }

    public function destroyById(int $id): bool
    {
        return $this->userRepository->delete($id);
    }

    public function updateById(int $id, array $data): bool
    {
        return $this->userRepository->update($id, $data);
    }

    public function create(array $data): ?Model
    {
        return $this->userRepository->create($data);
    }
}
