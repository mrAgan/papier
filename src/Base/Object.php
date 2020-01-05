<?php

namespace Papier\Base;

abstract class Object
{
    /**
     * The value of the object.
     *
     * @var mixed
     */
    protected $value;

    /**
     * Magical method.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->format();
    }

    /**
     * Format object's value.
     *
     * @return string
     */
    public function format()
    {
        return null;
    }

    /**
     * Get object's value.
     *
     * @return string
     */
    protected function getValue()
    {
        return $this->value;
    }

    /**
     * Set object's value.
     *  
     * @param  mixed  $value
     * @return \Papier\Object
     */
    protected function setValue($value)
    {
        $this->value = $value;
        return $this;
    }  
}