<?php

declare(strict_types=1);

namespace App\Components\Common\Model;

use Ramsey\Uuid\Nonstandard\Uuid;

trait HasUuid
{
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function getIncrementing(): bool
    {
        return false;
    }

    public function getKeyType(): string
    {
        return 'string';
    }
}
