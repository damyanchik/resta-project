<?php

declare(strict_types=1);

namespace App\DTOs;

class IndexDTO
{
    private string $search;
    private string $column;
    private string $order;
    private int $display;

    public function __construct(array $data)
    {
        $this->search = $data['search'];
        $this->column = $data['column'];
        $this->order = $data['order'];
        $this->display = $data['display'];
    }

    public function getSearch(): string
    {
        return $this->search;
    }

    public function getColumn(): string
    {
        return $this->column;
    }

    public function getOrder(): string
    {
        return $this->order;
    }

    public function getDisplay(): int
    {
        return $this->display;
    }
}
