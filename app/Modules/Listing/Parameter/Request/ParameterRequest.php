<?php

declare(strict_types=1);

namespace App\Modules\Listing\Parameter\Request;

use App\Modules\Listing\Parameter\Enum\QueryOrderEnum;
use Illuminate\Foundation\Http\FormRequest;

class ParameterRequest extends FormRequest implements ParametersBag
{
    public function rules(): array
    {
        return [
            'selected' => [
                'nullable',
            ],
            'in' => [
                'nullable',
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
        $selectedColumns = $this->input('selected');

        if (! is_array($selectedColumns)) {
            return [];
        }

        return $selectedColumns;    }

    public function getSearchColumns(): array
    {
        $searchColumns = $this->input('in');

        if (! is_array($searchColumns)) {
            return [];
        }

        return $searchColumns;
    }

    public function getSearchTerm(): string
    {
        return $this->string('search', '')->toString();
    }

    public function getOrderColumn(): string
    {
        return $this->string('by', '')->toString();
    }

    public function getOrderDirection(): QueryOrderEnum
    {
        return $this->enum('direction', QueryOrderEnum::class) ?? QueryOrderEnum::ASC;
    }

    public function getPerPage(): int
    {
        return max(0, $this->integer('per')) ?: 15;
    }
}
