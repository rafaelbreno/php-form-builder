<?php


namespace FormBuilder;


use FormBuilder\Traits\AddonTrait;
use FormBuilder\Traits\InputTrait;

class InputBuilder
{
    use InputTrait, AddonTrait;

    protected $params;

    protected $input;

    public function __construct($params = [])
    {
        $this->params = $params;
    }

    public function getInput()
    {
        $this->openInput();

        $this->fillInput();

        $this->closeInput();

        return $this->input;
    }

    public function openInput()
    {
        $this->input = "<input";
    }

    public function closeInput()
    {
        $this->input .= "/>";
    }

    public function addSpace()
    {
        $this->input .= ' ';
    }

    public function fillInput()
    {
        foreach ($this->params as $param => $value)
        {
            // Adding space between params
            $this->addSpace();

            $this->{$param}($value);
        }
    }
}
