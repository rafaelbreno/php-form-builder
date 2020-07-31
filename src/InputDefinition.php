<?php


namespace FormBuilder;



class InputDefinition
{
    protected $params;

//    protected $input = [];

    public function __construct($params = [])
    {
        $this->params = $params;
    }

    protected function getInput()
    {
        $this->setInput();
        return $this->input;
    }

    protected function setInput()
    {
        foreach ($this->params as $key => $value)
            $this->{$key}($value);
    }

    protected function name($name)
    {
        $this->params[] = compact('name');
    }

    public function id($id = null)
    {
        if(is_null($id))
            $id = $this->params['name'];
//        $this->params[] = compact('id');
        $this->params = array_merge($this->params, compact('id'));
    }

    protected function type($type)
    {
        $this->params[] = compact('type');
    }
}
