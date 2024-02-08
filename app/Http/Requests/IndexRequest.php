<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\DTOs\IndexDTO;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    const DEFAULT_SEARCH = '';
    const DEFAULT_COLUMN = 'id';
    const DEFAULT_ORDER = 'ASC';
    const DEFAULT_DISPLAY = 15;

    const ALLOWED_ORDERS = ['ASC', 'DESC'];

    public function data(): ?IndexDTO
    {
        return new IndexDTO([
            'search' => (string) $this->input('search', self::DEFAULT_SEARCH),
            'column' => (string) $this->input('column', self::DEFAULT_COLUMN),
            'order' => $this->validateOrder(),
            'display' => $this->validateDisplay(),
        ]);
    }

    private function validateOrder(): string
    {
        $order = (string) $this->input('order', self::DEFAULT_ORDER);

        return in_array(strtoupper($order), self::ALLOWED_ORDERS) ? $order : self::DEFAULT_ORDER;
    }

    private function validateDisplay(): int
    {
        $display = (int) $this->input('display', self::DEFAULT_DISPLAY);

        return max($display, 1);
    }
}
