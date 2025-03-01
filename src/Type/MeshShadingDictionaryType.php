<?php

namespace Papier\Type;

use InvalidArgumentException;
use Papier\Factory\Factory;
use Papier\Object\FunctionObject;
use Papier\Validator\BitsPerComponentValidator;
use Papier\Validator\BitsPerCoordinateValidator;
use Papier\Validator\BitsPerFlagValidator;
use Papier\Validator\NumbersArrayValidator;
use RuntimeException;

class MeshShadingDictionaryType extends ShadingDictionaryType
{
    /**
     * Set the number of bits used to represent each vertex coordinate.
     *
     * @param  int  $bits
     * @return MeshShadingDictionaryType
     * @throws InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setBitsPerCoordinate(int $bits): MeshShadingDictionaryType
    {
        if (!BitsPerCoordinateValidator::isValid($bits)) {
            throw new InvalidArgumentException("BitsPerCoordinate is incorrect. See ".__CLASS__." class's documentation for possible values.");
        }

        $value = Factory::create('Papier\Type\Base\IntegerType', $bits);

        $this->setEntry('BitsPerCoordinate', $value);
        return $this;
    }

    /**
     * Set the number of bits used to represent each colour component.
     *
     * @param  int  $bits
     * @return MeshShadingDictionaryType
     * @throws InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setBitsPerComponent(int $bits): MeshShadingDictionaryType
    {
        if (!BitsPerComponentValidator::isValid($bits)) {
            throw new InvalidArgumentException("BitsPerComponent is incorrect. See ".__CLASS__." class's documentation for possible values.");
        }

        $value = Factory::create('Papier\Type\Base\IntegerType', $bits);

        $this->setEntry('BitsPerComponent', $value);
        return $this;
    }

    /**
     * Set the number of bits used to represent the edge flag of each vertex.
     *
     * @param  int  $bits
     * @return MeshShadingDictionaryType
     * @throws InvalidArgumentException if the provided argument is not of type 'int'.
     */
    public function setBitsPerFlag(int $bits): MeshShadingDictionaryType
    {
        if (!BitsPerFlagValidator::isValid($bits)) {
            throw new InvalidArgumentException("BitsPerFlag is incorrect. See ".__CLASS__." class's documentation for possible values.");
        }

        $value = Factory::create('Papier\Type\Base\IntegerType', $bits);

        $this->setEntry('BitsPerFlag', $value);
        return $this;
    }

    /**
     * Set map from vertex coordinates and colour components to the appropriate ranges of values.
     *
     * @param  array<float>  $decode
     * @return MeshShadingDictionaryType
     * @throws InvalidArgumentException if the provided argument is not of type 'array' and if each element of the provided argument is not of type 'int' or 'float.
     */
    public function setDecode(array $decode): MeshShadingDictionaryType
    {
        if (!NumbersArrayValidator::isValid($decode)) {
            throw new InvalidArgumentException("Decode is incorrect. See ".__CLASS__." class's documentation for possible values.");
        }

        $value = Factory::create('Papier\Type\NumbersArrayType', $decode);

        $this->setEntry('Decode', $value);
        return $this;
    }

    /**
     * Set function.
     *
     * @param FunctionObject $function
     * @return MeshShadingDictionaryType
     * @throws InvalidArgumentException if the provided argument is not of type 'FunctionObject'.
     */
    public function setFunction(FunctionObject $function): MeshShadingDictionaryType
    {
        $this->setEntry('Function', $function);
        return $this;
    }

    /**
     * Format object's value.
     *
     * @return string
     */
    public function format(): string
    {
        if (!$this->hasEntry('BitsPerCoordinate')) {
            throw new RuntimeException("BitsPerCoordinate is missing. See ".__CLASS__." class's documentation for possible values.");
        }

        if (!$this->hasEntry('BitsPerComponent')) {
            throw new RuntimeException("BitsPerComponent is missing. See ".__CLASS__." class's documentation for possible values.");
        }

        if (!$this->hasEntry('BitsPerFlag')) {
            throw new RuntimeException("BitsPerFlag is missing. See ".__CLASS__." class's documentation for possible values.");
        }

        if (!$this->hasEntry('Decode')) {
            throw new RuntimeException("Decode is missing. See ".__CLASS__." class's documentation for possible values.");
        }

        return parent::format();
    }
}