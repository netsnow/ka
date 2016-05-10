<?php

class BaseLogic
{
    protected $result = '';

    public function set($key, $value)
    {
        $this->$key = $value;
    }

    public function run()
    {
        $this->preExecute();
        $this->execute();

        return $this->result;
    }

    protected function preExecute()
    {
    }

    protected function execute()
    {
    }
}
