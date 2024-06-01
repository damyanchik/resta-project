<?php

declare(strict_types=1);

namespace App\Components\Common\Listing\Parameter\Request;

use App\Components\Common\Listing\Parameter\Enum\QueryOrderEnum;
use App\Components\Common\Listing\Parameter\Enum\QueryParameterEnum;
use Illuminate\Foundation\Http\FormRequest;

class ParameterRequest extends FormRequest implements ParametersBag
{
    private const DEFAULT_PER_PAGE = 15;

    public function rules(): array
    {
        return [
            QueryParameterEnum::SELECT_COLUMN->value => [
                'nullable',
            ],
            QueryParameterEnum::SEARCH_IN_COLUMN->value => [
                'nullable',
            ],
            QueryParameterEnum::SEARCH_TERM->value => [
                'nullable',
                'string',
            ],
            QueryParameterEnum::ORDER_BY->value => [
                'nullable',
                'string'
            ],
            QueryParameterEnum::ORDER_BY_DIRECTION->value => [
                'nullable',
                'string',
            ],
            QueryParameterEnum::PER_PAGE->value => [
                'nullable',
                'integer',
            ],
        ];
    }

    public function getSelectedColumns(): array
    {
        $selectedColumns = $this->input(QueryParameterEnum::SELECT_COLUMN->value);

        return is_array($selectedColumns)
            ? $selectedColumns
            : [];
    }

    public function getSearchColumns(): array
    {
        $searchColumns = $this->input(QueryParameterEnum::SEARCH_IN_COLUMN->value );

        return is_array($searchColumns)
            ? $searchColumns
            : [];
    }

    public function getSearchTerm(): string
    {
        return $this->string(QueryParameterEnum::SEARCH_TERM->value , '')->toString();
    }

    public function getOrderColumn(): string
    {
        return $this->string(QueryParameterEnum::ORDER_BY->value , '')->toString();
    }

    public function getOrderDirection(): QueryOrderEnum
    {
        return $this->enum(QueryParameterEnum::ORDER_BY_DIRECTION->value, QueryOrderEnum::class)
            ?? QueryOrderEnum::ASC;
    }

    public function getPerPage(): int
    {
        return max(0, $this->integer(QueryParameterEnum::PER_PAGE->value)) ?: self::DEFAULT_PER_PAGE;
    }
}
