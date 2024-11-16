<?php

namespace Papier\Type;

use Papier\Object\DictionaryObject;

use Papier\Factory\Factory;

use Papier\Validator\NumbersArrayValidator;

use InvalidArgumentException;
use RuntimeException;

class LabColourSpaceDictionaryType extends DictionaryObject
{
    /**
     * Set white point.
     * 
     * @param array $whitepoint
     * @return LabColourSpaceDictionaryType
     * @throws InvalidArgumentException if the provided argument is not an array of type 'int' or 'float'.
     */
    public function setWhitePoint(array $whitepoint): LabColourSpaceDictionaryType
    {
        if (!NumbersArrayValidator::isValid($whitepoint, 3)) {
            throw new InvalidArgumentException("WhitePoint is incorrect. See ".__CLASS__." class's documentation for possible values.");
        }

        $value = Factory::create('NumbersArray', $whitepoint);

        $this->setEntry('WhitePoint', $value);
        return $this;
    } 

    /**
     * Set black point.
     * 
     * @param array $blackpoint
     * @return LabColourSpaceDictionaryType
     * @throws InvalidArgumentException if the provided argument is not an array of type 'int' or 'float'.
     */
    public function setBlackPoint(array $blackpoint): LabColourSpaceDictionaryType
    {
        if (!NumbersArrayValidator::isValid($blackpoint, 3)) {
            throw new InvalidArgumentException("BlackPoint is incorrect. See ".__CLASS__." class's documentation for possible values.");
        }

        $value = Factory::create('NumbersArray', $blackpoint);

        $this->setEntry('BlackPoint', $value);
        return $this;
    }

    /**
     * Set range.
     * 
     * @param array $range
     * @return LabColourSpaceDictionaryType
     * @throws InvalidArgumentException if the provided argument is not an array of type 'int' or 'float'.
     */
    public function setRange(array $range): LabColourSpaceDictionaryType
    {
        if (!NumbersArrayValidator::isValid($range, 4)) {
            throw new InvalidArgumentException("Range is incorrect. See ".__CLASS__." class's documentation for possible values.");
        }

        $value = Factory::create('NumbersArray', $range);

        $this->setEntry('Range', $value);
        return $this;
    }

    /**
     * Format object's value.
     *
     * @return string
     */
    public function format(): string
    {
        if (!$this->hasEntry('WhitePoint')) {
            throw new RuntimeException("WhitePoint is missing. See ".__CLASS__." class's documentation for possible values.");
        }
                
        return parent::format();
    }
}