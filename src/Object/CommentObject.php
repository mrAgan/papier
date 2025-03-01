<?php

namespace Papier\Object;

use InvalidArgumentException;
use Papier\Validator\StringValidator;

class CommentObject extends BaseObject
{
    /**
    * Set comment's value.
    *
    * @param mixed $value
    * @return CommentObject
    * @throws InvalidArgumentException if the provided argument is not of type 'string'.
    */
    public function setValue(mixed $value): CommentObject
    {
        if (!StringValidator::isValid($value)) {
            throw new InvalidArgumentException("String is incorrect. See ".__CLASS__." class's documentation for possible values.");
        }

        parent::setValue($value);
        return $this;
    }

    /**
     * Format comment's value.
     *
     * @return string
     */
    public function format(): string
    {
		/** @var string $value */
        $value = $this->getValue();

        $trans = array('%' => '\%');
        $value = strtr($value, $trans);

        return '%'.$value;
    }
}