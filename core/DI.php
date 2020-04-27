<?php

class DI
{

    private $service = array();

    public function get($object, $args = null, $alias = null)
    {
        return empty($this->service[$alias ?: $object]) ? $this->instance($object, $args) : $this->service[$alias ?: $object];
    }

    public function kill($instance)
    {
        if (!empty($this->service[$instance])) $this->service[$instance] = null;
    }

    private function instance($object, $args = null)
    {
        return $args ? new $object(...$args) : new $object($this);
    }
}