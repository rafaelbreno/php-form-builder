<?php


namespace FormBuilder\Traits;


trait InputTrait
{
    public function type($type)
    {
        $this->input .= "type='$type'";
    }

    public function name($name)
    {
        $this->input .= "name='$name'";
    }
}
