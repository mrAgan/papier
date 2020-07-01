<?php

namespace Papier\File;

use Papier\Base\Object;
use Papier\Validator\IntValidator;
use Papier\Validator\BoolValidator;


use InvalidArgumentException;

class FileHeader extends Object
{
    /**
     * Minimum allowable value of header's version.
     *
     * @var int
     */
    private $minVersion = 0;

    /**
     * Maximal allowable value of header's version.
     *
     * @var int
     */
    private $maxVersion = 7;

    /**
     * Bool which indicates if file has binary data.
     *
     * @var bool
     */
    private $binaryData = true;  
    /**
     * Format header's content.
     *
     * @return string
     */
    public function format()
    {
        $value = sprintf("%%PDF-1.%d", $this->getVersion());
        if ($this->hasBinaryData()) {
            $comment = new Comment();
            $chars = array_map('chr', range(128, 131));
            $value .= $comment->setValue(implode('', $chars))->format();
        }
        return $value;
    }

    /**
     * Get header's version.
     *
     * @return int
     */
    protected function getVersion()
    {
        return $this->getValue() ?? 0;
    }

    /**
     * Set header's version.
     *  
     * @param  int  $version
     * @return \Papier\File\FileHeader
     */
    protected function setVersion($version)
    {
        if (!IntValidator::isValid($version, $this->minVersion, $this->maxVersion)) {
            throw new InvalidArgumentException("Version is incorrect. See FileHeader class's documentation for possible values.");
        }

        return parent::setValue($value);
    } 

    /**
     * Get if file has binary data.
     *
     * @return int
     */
    protected function hasBinaryData()
    {
        return $this->binaryData;
    }

    /**
     * Set if file has binary data.
     *  
     * @param  bool  $binaryData
     * @return \Papier\File\FileHeader
     */
    protected function setBinaryData($binaryData)
    {
        if (!BoolValidator::isValid($binaryData)) {
            throw new InvalidArgumentException("BinaryData is incorrect. See ".get_class($this)." class's documentation for possible values.");
        }

        $this->binaryData = $binaryData;
        return $this;
    } 
}