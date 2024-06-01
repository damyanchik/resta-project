<?php

declare(strict_types=1);

namespace App\Components\Common\Listing\View\Builder\ColumnBuilder;

use App\Components\Common\Listing\Parameter\Enum\ListingParameterEnum;

class Column implements ColumnBuilderInterface
{
    private bool $isVisible = false;
    private bool $isRemoval = true;
    private bool $isSortable = false;
    private bool $isSearchable = false;
    private bool $isFilterable = false;
    private bool $isRangeable = false;

    public static function build(): ColumnBuilderInterface
    {
        return new static;
    }

    public function visible(bool $isRemoval = true): self
    {
        $this->isVisible = true;
        $this->isRemoval = $isRemoval;

        return $this;
    }

    public function sortable(): self
    {
        $this->isSortable = true;

        return $this;
    }

    public function searchable(): self
    {
        $this->isSearchable = true;

        return $this;
    }

    public function filterable(): self
    {
        $this->isFilterable = true;

        return $this;
    }

    public function rangeable(): self
    {
        $this->isRangeable = true;

        return $this;
    }

    public function get(): array
    {
        return [
            ListingParameterEnum::IS_VISIBLE->value => $this->isVisible,
            ListingParameterEnum::IS_REMOVAL->value  => $this->isRemoval,
            ListingParameterEnum::IS_SORTABLE->value  => $this->isSortable,
            ListingParameterEnum::IS_SEARCHABLE->value  => $this->isSearchable,
            ListingParameterEnum::IS_FILTERABLE->value => $this->isFilterable,
            ListingParameterEnum::IS_RANGEABLE->value => $this->isRangeable,
        ];
    }
}
