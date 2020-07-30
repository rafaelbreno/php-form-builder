<?php


namespace FormBuilder;


use Closure;

class Form
{
    protected $blueprint;

    public function create($route, Closure $callback)
    {
        $this->build(tap(
            $this->createBlueprint($route),
            function ($blueprint) use ($callback) {
//                $blueprint->create();

                $callback($blueprint);
            }
        ));

        return $this->blueprint;
    }

    protected function createBlueprint($route, Closure $callback = null)
    {
        return new Blueprint($route, $callback);
    }

    protected function build(Blueprint $blueprint)
    {
//        $blueprint->build();

        $this->blueprint = $blueprint;
    }
}
