<?php

declare(strict_types=1);

namespace App\Components\Common\Enum;

use Illuminate\Support\Collection;

trait BasicEnumTrait
{
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function array(): array
    {
        return array_combine(self::values(), self::names());
    }

    public static function collection(): Collection
    {
        return new Collection(self::array());
    }
}
