<?php


namespace FormBuilder;


use Closure;
use FormBuilder\Traits\AddonTrait;
use FormBuilder\Traits\InputTrait;
use Illuminate\Support\Fluent;

class Blueprint
{
    use InputTrait, AddonTrait;

    protected $route;

    protected $method;

    protected $form;

    protected $commands;

    protected $inputs;

    public function __construct($route, $method = "GET", Closure $callback = null)
    {
        $this->route = $route;
        $this->method = $method;

        if(! is_null($callback)) {
            $callback($this);
        }
    }

    public function build()
    {
        $this->startForm();
        return $this;
    }

    public function create()
    {
        return $this->addCommand('create');
    }

    protected function addCommand($name = "", $params = [])
    {
        $this->commands[] = $command = $this->createCommand($name, $params);

        return $command;
    }

    protected function createCommand($name = "", $params = [])
    {
        return new Fluent(array_merge(compact('name'), $params));
    }

    protected function startForm()
    {
        $this->form = "<form action='$this->route' method='$this->method'>";
    }

    public function text($name = "")
    {
        return $this->addInput($name, 'text');
    }

    public function addInput($name = "", $type = "", $params = [])
    {
        $this->inputs[] = $input = (new InputBuilder(
            array_merge(
                compact('name', 'type'), $params
            )
        ))->getInput();
        return $input;
    }
}
