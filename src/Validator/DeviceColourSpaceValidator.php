<?php

namespace Papier\Validator;

use Papier\Graphics\DeviceColourSpace;

class DeviceColourSpaceValidator extends StringValidator
{
    /**
     * Device colour spaces.
     *
     * @var array<string>
     */
    const DEVICE_COLOUR_SPACES = array(
        DeviceColourSpace::GRAY,
        DeviceColourSpace::RGB,
        DeviceColourSpace::CMYK,
    );


     /**
     * Test if given parameter is a valid device colour space.
     * 
     * @param  string  $value
     * @return bool
     */
    public static function isValid($value): bool
    {
        return parent::isValid($value) && in_array($value, self::DEVICE_COLOUR_SPACES);
    }
}