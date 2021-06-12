<?php

namespace Papier\Filter;

use Papier\Filter\Base\Filter;
use Papier\Validator\StringValidator;

use RuntimeException;
use InvalidArgumentException;

class ASCIIHexEncodeFilter extends Filter
{  
    /**
     * End-of-data marker.
     *
     * @var string
     */
    const EOD_MARKER = ">";

    /**
     * Encode value.
     *  
     * @param  string  $value
     * @param  array  $param
     * @return string
     * @throws InvalidArgumentException if the provided argument is not a string.
     */
    public static function process(string $value, array $param = array()): string
    {
        return ASCIIHexFilter::decode($value, $param);
    }
}