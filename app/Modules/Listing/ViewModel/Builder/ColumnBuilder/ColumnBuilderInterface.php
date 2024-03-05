<?php

declare(strict_types=1);

namespace App\Modules\Listing\ViewModel\Builder\ColumnBuilder;

interface ColumnBuilderInterface
{
    public static function build(): self;
    public function visible(bool $isRemoval = true): self;
    public function sortable(): self;
    public function searchable(): self;
    public function filterable(): self;
    public function rangeable(): self;
    public function get(): array;
}
