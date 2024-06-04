<?php

declare(strict_types=1);

namespace App\Components\Common\EloquentRepository;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

abstract class AbstractRepository
{
    private const ALL_COLUMNS = '*';
    private const UUID = 'uuid';
    private const CREATED_AT = 'created_at';
    private const UPDATED_AT = 'updated_at';

    public function findByUuid(string $uuid, array $columns = [self::ALL_COLUMNS]): ?Model
    {
        return $this->model->find($uuid, $columns);
    }

    public function create(EloquentDataBag $data): string
    {
        return $this->model->create($data->toArray())->getKey();
    }

    public function insert(array $data): bool
    {
        $now = Carbon::now()->toDateTimeString();

        foreach ($data as &$element) {
            $element[self::CREATED_AT] = $now;
            $element[self::UPDATED_AT] = $now;
        }

        return (bool) $this->model->insert($data);
    }

    public function update(EloquentDataBag $data, string $uuid): bool
    {
        $model = $this->model->findOrFail($uuid);

        if ($model === null) {
            return false;
        }

        return $model->update($data->toArray());
    }

    public function delete(string $uuid): bool
    {
        $model = $this->model->findOrFail($uuid);

        if ($model === null) {
            return false;
        }

        return $model->delete();
    }

    public function getByUuids(array $uuids, array $columns = [self::ALL_COLUMNS]): Collection
    {
        return $this->model
            ->newQuery()
            ->select($columns)
            ->whereIn(self::UUID, $uuids)
            ->get();
    }

    public function getBy(
        string|int|float|array $needle,
        string $byColumn,
        array $columns = [self::ALL_COLUMNS],
    ): Collection
    {
        return $this->model
            ->newQuery()
            ->select($columns)
            ->whereIn($byColumn, Arr::wrap($needle))
            ->get();
    }
}
