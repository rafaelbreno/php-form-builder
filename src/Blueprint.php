<?php


namespace FormBuilder;


use Illuminate\Support\Fluent;

class Blueprint
{
    protected $route;

    protected $inputs = [];


    public function __construct($route, \Closure $callback = null)
    {
        $this->route = $route;
        if(! is_null($callback)){
            $callback($this);
        }
    }

    public function text($name)
    {
        return $this->addInput('text', $name);
    }

    protected function addInput($type, $name, $params = [])
    {
        /*
         * [
         *     'type' => $type,
         *     'name' => $name,
         *     $params
         * ]
         * */
        $this->inputs[]
            = $input
            = new InputDefinition(array_merge(
                compact('type', 'name'), $params
            )
        );
        return $input;
    }

//    public function build()
//    {
//        //
//    }

//    public function create()
//    {
//        $this->addCommand('create');
//    }
//
//    protected function addCommand($name, $params = [])
//    {
//        $this->commands[] = $command = $this->createCommand($name, $params);
//
//        return $command;
//    }
//
//    protected function createCommand($name, $params = [])
//    {
//        return new Fluent(array_merge(
//            compact('name'), $params
//        ));
//    }
}
