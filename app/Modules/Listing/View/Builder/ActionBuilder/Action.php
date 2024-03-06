<?php

declare(strict_types=1);

namespace App\Modules\Listing\View\Builder\ActionBuilder;

class Action implements ActionBuilderInterface
{
    private string $tag;
    private string $method;
    private string $icon;
    private string $route;
    private ?string $description = null;

    public static function build(): ActionBuilderInterface
    {
        return new static;
    }

    public function addTag(string $tag, string $method): self
    {
        $this->tag = $tag;
        $this->method = $method;

        return $this;
    }

    public function addIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function addRoute(string $route): self
    {
        $this->route = $route;

        return $this;
    }

    public function addDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function get(): array
    {
        return [
            'tag' => $this->tag,
            'method' => $this->method,
            'icon' => $this->icon,
            'route' => $this->route,
            'description' => $this->description,
        ];
    }
}
