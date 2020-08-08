<?php

namespace Papier\Object;

use Papier\Object\DictionaryObject;
use Papier\Object\LiteralStringObject;
use Papier\Base\IndirectObject;

use InvalidArgumentException;

class LimitsArrayObject extends ArrayObject
{

    /**
     * Format object's value.
     *
     * @return string
     */
    public function format()
    {
        $objects = $this->getObjects() ?? array();
        $value = '';
        if (is_array($objects)) {
            foreach ($objects as $object) {
                $value .= ' '.$object->format();
            }
        }

        return '[' .trim($value). ']';
    }
}