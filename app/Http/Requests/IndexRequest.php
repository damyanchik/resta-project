<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\DTOs\IndexDTO;
use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function data(): ?IndexDTO
    {
        return new IndexDTO([
            'search' => (string) $this->input('search', ''),
            'column' => (string) $this->input('column', 'id'),
            'order' => (string) $this->input('order', 'ASC'),
            'display' => (int) $this->input('display', 15),
        ]);
    }
}
