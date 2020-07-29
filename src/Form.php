<?php


namespace FormBuilder;


use Closure;

class Form
{
    public function create(string $route, string $method, Closure $callback)
    {
        $this->build(
            tap(
                $this->createBlueprint($route, $method),
                function ($blueprint) use ($callback) {
                    $blueprint->create();

                    $callback($blueprint);
                }
            )
        );


        return $this;
    }

    protected function createBlueprint(string $route, string $method)
    {
        return new Blueprint($route, $method);
    }

    protected function build(Blueprint $blueprint)
    {
        $blueprint->build();
    }
}
