<?php

declare(strict_types=1);

namespace App\Modules\Listing\ViewModel\Builder\ActionBuilder;

interface ActionBuilderInterface
{
    public static function build(): self;
    public function addTag(string $tag, string $method): self;
    public function addIcon(string $icon): self;
    public function addRoute(string $route): self;
    public function addDescription(string $description): self;
    public function get(): array;
}
