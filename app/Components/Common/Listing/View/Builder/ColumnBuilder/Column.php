<?php

declare(strict_types=1);

namespace App\Components\Common\Listing\View\Builder\ColumnBuilder;

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
            'isVisible' => $this->isVisible,
            'isRemoval' => $this->isRemoval,
            'isSortable' => $this->isSortable,
            'isSearchable' => $this->isSearchable,
            'isFilterable' => $this->isFilterable,
            'isRangeable' => $this->isRangeable,
        ];
    }
}
