<?php

declare(strict_types=1);

namespace App\Modules\Listing\Parameter\Request;

use App\Modules\Listing\Parameter\Enum\Order;
use Illuminate\Foundation\Http\FormRequest;

class ParameterRequest extends FormRequest implements ParametersBag
{
    public function rules(): array
    {
        return [
            'selected' => [
                'nullable',
                'string',
            ],
            'in' => [
                'nullable',
                'string',
            ],
            'search' => [
                'nullable',
                'string',
            ],
            'by' => [
                'nullable',
                'string'
            ],
            'direction' => [
                'nullable',
                'string',
            ],
            'per' => [
                'nullable',
                'integer',
            ],
        ];
    }

    public function getSelectedColumns(): array
    {
        return $this->input('selected', []);
    }

    public function getSearchColumns(): array
    {
        return $this->input('in', []);
    }

    public function getSearchTerm(): string
    {
        return $this->string('search', '')->toString();
    }

    public function getOrderColumn(): string
    {
        return $this->string('by', '')->toString();
    }

    public function getOrderDirection(): Order
    {
        return $this->enum('direction', Order::class) ?? Order::ASC;
    }

    public function getPerPage(): int
    {
        return max(0, $this->integer('per')) ?: 15;
    }
}
