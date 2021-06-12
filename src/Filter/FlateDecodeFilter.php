<?php


namespace Papier\Filter;


use Papier\Filter\Base\Filter;
use Papier\Validator\StringValidator;

class FlateDecodeFilter extends Filter
{
    /**
     * Process stream.
     *
     * @param  string  $stream
     * @param array $param
     * @return string
     * @throws InvalidArgumentException if stream does not end with the end-of-data marker.
     * @throws RuntimeException if stream is empty.
     */
    public static function process(string $stream, array $param = array()): string
    {
        return FlateFilter::encode($stream, $param);
    }
}