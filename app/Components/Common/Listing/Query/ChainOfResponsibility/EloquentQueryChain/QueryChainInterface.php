<?php

declare(strict_types=1);

namespace App\Components\Common\Listing\Query\ChainOfResponsibility\EloquentQueryChain;

use App\Components\Common\Listing\Parameter\DTO\ParametersDTO;
use Illuminate\Database\Eloquent\Builder;

interface QueryChainInterface
{
    public function setNext(QueryChainInterface $next): ?QueryChainInterface;
    public function build(ParametersDTO $parametersDTO, Builder $builder): QueryChainInterface;
}
