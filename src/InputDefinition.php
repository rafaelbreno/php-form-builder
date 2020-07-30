<?php


namespace FormBuilder;



class InputDefinition
{
    protected $params;

    protected $input;

    public function __construct($params = [])
    {
        $this->params = $params;

    }

    public function getInput()
    {
        $this->setInput();
        return $this->input;
    }

    protected function setInput()
    {
        $this->input = "<input ";
        foreach ($this->params as $key => $value)
            $this->{$key}($value);
        $this->input .= ">";
    }

    protected function name($name)
    {
        $this->input .= "name='$name' ";
    }

    protected function type($type)
    {
        $this->input .= "type='$type' ";
    }
}
