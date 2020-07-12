<?php

namespace Papier\File;

use Papier\Base\BaseObject;
use Papier\Validator\VersionValidator;
use Papier\Validator\BoolValidator;

use InvalidArgumentException;

class FileHeader extends BaseObject
{
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
     * @throws InvalidArgumentException if the provided argument is not of type 'int' or is outside acceptable values.
     * @return \Papier\File\FileHeader
     */
    protected function setVersion($version)
    {
        if (!VersionValidator::isValid($version)) {
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
     * @throws InvalidArgumentException if the provided argument is not of type 'bool'.
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