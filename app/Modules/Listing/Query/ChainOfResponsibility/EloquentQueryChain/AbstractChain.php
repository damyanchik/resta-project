<?php

declare(strict_types=1);

namespace App\Modules\Listing\Query\ChainOfResponsibility\EloquentQueryChain;

use App\Modules\Listing\Parameter\DTO\ParametersDTO;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractChain implements QueryChainInterface
{
    protected ?self $next = null;

    public function setNext(QueryChainInterface $next): ?QueryChainInterface
    {
        $this->next = $next;

        return $next;
    }

    public function build(ParametersDTO $parametersDTO, Builder $builder): self
    {
        $this->next?->build($parametersDTO, $builder);

        return $this;
    }
}
